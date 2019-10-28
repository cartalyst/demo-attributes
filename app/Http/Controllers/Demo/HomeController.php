<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application welcome screen to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('demo/index');
    }
}
