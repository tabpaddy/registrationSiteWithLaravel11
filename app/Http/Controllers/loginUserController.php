<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'username_or_email' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Determine if the input is an email or a username
        $loginType = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Attempt to log the user in
        if (Auth::guard('web')->attempt([$loginType => $request->username_or_email, 'password' => $request->password])) {
            // If successful then redirect to their intended location
            return redirect()->intended(route('view.index'));
        } else {
            // If unsuccessful, then redirect back to the login with the form data
            return back()->withErrors([
                'username_or_email' => 'The provided credentials do not match our records',
            ])->withInput($request->only('username_or_email', 'remember'));
        }
    }

    public function logout(Request $request)
    {
        //login out
        Auth::guard('web')->logout();

        $request->session()->invalidate();//destroy session
        $request->session()->regenerateToken();//regenerate token
        return to_route('view.index');
    }
}
