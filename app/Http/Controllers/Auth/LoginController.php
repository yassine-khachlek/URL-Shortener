<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    protected $redirectAfterLogout = 'welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route_lang(\App::getLocale(), $this->redirectTo);

        $this->redirectAfterLogout = route_lang(\App::getLocale(), $this->redirectAfterLogout);

        $this->middleware('guest', ['except' => 'logout']);
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);

        return redirect($this->redirectAfterLogout);
    }
}
