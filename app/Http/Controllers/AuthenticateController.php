<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function authenticate(){
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success','Logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user with the given email found',
            'password' => 'Password for the given user does not match'
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->route('login')->with('success','successfully logged out');

    }
}
