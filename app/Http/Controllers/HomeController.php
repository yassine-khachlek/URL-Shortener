<?php

namespace App\Http\Controllers;

use App\Url;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();
        $urls_count = Url::count();

        /*
        * TODO: URl views count is not opimized
        */
        $url = Url::get();

        return view('home', compact('users_count', 'urls_count', 'url'));
    }
}
