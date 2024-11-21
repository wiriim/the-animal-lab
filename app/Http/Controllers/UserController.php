<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        return view("pages.profile");
    }

    public function login(){
        return view("auth.login");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
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
            'mismatch' => 'The provided credentials do not match our records.',
        ]);

    }

    public function register(Request $request){
        return view("auth.register");
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => ['required'],
            'email'=> ['required', 'email'],
            'password'=> ['required'],
            'confPassword' => ['required'],
        ]);

        if ($request->password != $request->confPassword) {
            return redirect()->route("register")->withErrors([
                'error' => 'Password does not match'
            ]);
        }

        User::create([
            'name' => $validate['name'],
            'email'=> $validate['email'],
            'password'=> $validate['password'],
        ]);
        return redirect()->route('login')->with('success','Register Successful');
    }
}
