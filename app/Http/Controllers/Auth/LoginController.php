<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

        protected $redirectTo = '/welcome';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function adminlogin()
    {
        if (Auth::attempt(['email' => \request('email'), 'password' =>\request('password'), 'role' => "Admin"])) {
            return \redirect('/welcome');
        }
        else
        {
            return Redirect::back()->with('error',"Wrong username or password");
        }
    }
    public function login11()
    {
        if (Auth::attempt(['email' => \request('email'), 'password' =>\request('password')])) {
            return \redirect('/welcome');
        }
        else
        {
            return Redirect::back()->with('error',"Wrong username or password");
        }
    }

    public function showLoginForm()
    {
        return view('layout_ace.ace_master.cust_login');
        /*return view('auth.login');*/
    }
    public function logout(Request $request) {

         $redirect="/admin/login";
        if(Auth::user()->role=='user')
        {
            $redirect="/login";
        }
        Auth::logout();
        return redirect($redirect);
    }
}
