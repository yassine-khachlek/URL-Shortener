<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Url;

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

        return view('home', compact('users_count', 'urls_count'));
    }
}
