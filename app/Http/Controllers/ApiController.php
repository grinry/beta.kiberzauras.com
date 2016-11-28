<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller {

    protected $devices = [
        'Android Phone',
        'Android Tablet',
        'iPhone',
        'iPad',
        'Windows phone',
        'Tizen',
        'Personal Computer (Windows)',
        'Personal Computer (Linux)',
        'Personal Computer (Mac OS)',
        'XBox',
        'PS4',
    ];

    public function devices(Request $request)
    {
        return response()->json($this->devices);
    }
}