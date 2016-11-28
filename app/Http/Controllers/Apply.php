<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class Apply
 * @package App\Http\Controllers
 * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
 */
class Apply extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Rytis Grincevičius <rytis.grincevicius@gmail.com>
     */
    public function index()
    {
        return view('apply.index');
    }

    public function submit(Request $request)
    {
        $this->validate($request, []);


    }
}
