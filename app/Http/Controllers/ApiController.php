<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Interest;
use App\Models\SocialPlatform;
use App\Models\User;
use App\Notifications\AccountCreated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class ApiController
 * @package App\Http\Controllers
 * @author Rytis Grincevicius <rytis@inlu.net>
 */
class ApiController extends Controller {

    /**
     * @param Request $request
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function register(Request $request)
    {
        $messages = [
            'social_platforms.*.id.required' => 'Selected social platform is invalid.',
            'social_platforms.*.id.exists' => 'Selected social platform is invalid.',
            'social_platforms.*.profile.url' => 'Social platform profile must be valid url.',
            'devices.*.exists' => 'Selected device is invalid.',
            'interests.*.exists' => 'Selected interest is invalid.',
        ];

        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'gender'        =>  'required|in:'.join(',', [User::GENDER_MALE, User::GENDER_FEMALE]),
            'birthday'      =>  'required|date',
            'email'         =>  'required|email|unique:users,email',
            'phone_number'  =>  'sometimes',
            'interests'     =>  'array|required',
            'interests.*'   =>  'required|exists:interests,id',
            'devices'       =>  'array|required',
            'devices.*'     =>  'required|exists:devices,id',
            'social_platforms'     =>  'array',
            'social_platforms.*'     =>  'array',
            'social_platforms.*.id'   =>  'required|exists:social_platforms,id',
            'social_platforms.*.profile'   =>  'sometimes|url|nullable',
            'agreement'     =>  'required:is:1',
            'newsletter'    =>  'boolean'
        ], $messages);


        $number = $request->input('phone_number');

        $data = [
            'first_name'    =>  $request->input('first_name'),
            'last_name'    =>  $request->input('last_name'),
            'gender'    =>  $request->input('gender'),
            'birthday'    =>  $request->input('gender'),
            'email'    =>  $request->input('email'),
            'phone_number'    =>  $number != '+' ? $number : null,
            'applied'   =>  true,
            'newsletter' =>  $request->input('newsletter', false),
            'agreement_at'  =>  Carbon::now(),
            'password'  =>  bcrypt(str_random())
        ];

        if ($user = User::create($data)) {
            $user->devices()->sync($request->input('devices', []));
            $user->interests()->sync($request->input('interests', []));
            foreach ($request->input('social_platforms', []) as $platform) {
                $user->social_platforms()->attach($platform['id'], [
                    'profile'   =>  array_get($platform, 'profile')
                ]);
            }
            $user->notify(new AccountCreated($user));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function formData(Request $request)
    {
        return response()->json([
            'gender'    =>  $this->genders(),
            'devices'   =>  $this->devices(),
            'social_platforms'  =>  $this->socialPlatforms(),
            'interests' =>  $this->interests()
        ]);
    }

    /**
     * @return array
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    protected function genders()
    {
        return [
            User::GENDER_MALE => 'Male',
            User::GENDER_FEMALE => 'Female',
        ];
    }

    /**
     * @return Collection
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    protected function devices()
    {
        return Device::all('id', 'name')->transform(function($item) {
            return [
                'key'       =>  $item->id,
                'value'     =>  $item->name,
                'selected'  =>  false
            ];
        });
    }

    /**
     * @return Collection
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    protected function socialPlatforms()
    {
        return SocialPlatform::all('id', 'name')->transform(function($item) {
            return [
                'key'       =>  $item->id,
                'value'     =>  $item->name,
                'profile'   =>  null,
                'selected'  =>  false
            ];
        });
    }

    /**
     * @return Collection
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    protected function interests()
    {
        return Interest::all('id', 'name')->transform(function($item) {
            return [
                'key'       =>  $item->id,
                'value'     =>  $item->name,
                'selected'  =>  false
            ];
        });
    }
}