<?php

namespace App\Http\Controllers\Cpa\Auth;

use App\Http\Controllers\Cpa\Auth;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cpa/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:cpa')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('cpa.auth.login');
    }
    
    protected function guard()
    {
        return \Auth::guard('cpa');
    }
    
     public function logout(Request $request)
    {
        $this->guard('cpa')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
