<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        return view("pages.profile");
    }

    public function login(){
        return view("pages.login");
    }
    public function authenticate(Request $request){

        $credentials = $request->validate([
            "email"=> ["required","email"],
            "password"=> ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);

    }
}
