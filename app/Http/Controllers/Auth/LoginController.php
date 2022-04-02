<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
  protected $redirectTo = '/';
  protected $dni = 'dni';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function postLogin(Request $request)
  {
    $this->validate($request, [$this->username() => 'required', 'password' => 'required']);
    if ($this->signIn($request)) {
      return redirect()->intended('/');
    }
    return redirect()->back();
  }

  public function username()
  {
    return 'dni';
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect()->back();
  }

  protected function authenticated(Request $request, $user)
  {
    return redirect()->route('home');
  }

  protected function credentials(Request $request)
  {
    $credentials = $request->only($this->username(), 'password');
    $credentials['active'] = 1;
    return $credentials;
  }
}
