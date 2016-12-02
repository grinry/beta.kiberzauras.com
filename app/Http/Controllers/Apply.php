<?php

namespace App\Http\Controllers;

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

    /**
     * @todo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function close()
    {
        return view('close.index');
    }

    /**
     * @todo
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Rytis Grincevicius <rytis@inlu.net>
     */
    public function closeReturn($id)
    {
        return view('close.return');
    }
}
