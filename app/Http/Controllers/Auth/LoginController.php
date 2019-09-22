<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Login(Request $request)
    {

        $login = 'imfullstack@imawesome.com';
        $pass = '$2y$10$KMUCbjHxrZp6obIAuLjYEessC3cHY.2D1KwmSgreAOArcD9lCJXZu';

        $request->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->input('username') === $login && Hash::check($request->input('password'), $pass)) {
            $request->session()->put('authenticated', time());
            $request->session()->flash('loginSuccessfully', 'Login was successful!');
            return redirect('/');
        }
        $request->session()->flash('loginError', 'Wrong password or username');
        return redirect('/login');

    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        return redirect('/login');
    }
}
