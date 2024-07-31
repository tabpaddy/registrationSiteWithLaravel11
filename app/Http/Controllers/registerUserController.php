<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewUserMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class registerUserController extends Controller
{
    //
    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate the request

        $request->validate([
            'username' =>['required', 'string', 'max:255', 'min:5', 'unique:users,name'],
            'email' =>'required|email|unique:users,email',
            'password' =>['required', 'min:8', 'confirmed', Password::defaults()],
            'thumbnail' =>['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail');

        
        // create a new user
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'thumbnail' => $validated['thumbnail'],
        ]);

        // mail
        dispatch(new SendNewUserMailJob(['username' => $user->name, 'email' => $user->email]));

        // redirect to login page
        return to_route('login')->with('status', 'Registration successful..!, You can now login');
    }
}
