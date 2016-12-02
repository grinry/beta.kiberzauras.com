<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Device[] $devices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Interest[] $interests
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SocialPlatform[] $social_platforms
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @mixin \Eloquent
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property integer $gender
 * @property string $birthday
 * @property string $phone_number
 * @property boolean $newsletter
 * @property boolean $applied
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereNewsletter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereApplied($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['agreement_at'];

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function devices()
    {
        return $this->belongsToMany(Device::class, 'user_devices');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interests');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function social_platforms()
    {
        return $this->belongsToMany(SocialPlatform::class, 'user_social_platforms')->withPivot(['profile']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
