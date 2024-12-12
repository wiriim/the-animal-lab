<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function profile(){
        $comments = Auth::user()->comments()->orderByDesc('created_at')->paginate(15);
        return view("pages.profile", ['comments'=> $comments]);
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
            'role'=> 'user'
        ]);
        return redirect()->route('login')->with('success','Register Successful');
    }

    public function edit(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'picture' => 'image|nullable',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        if ($request->has('picture')){
            $path = $request->file('picture')->store('pictures', 'public');
            $validate['picture'] = $path;
            if ($user->picture !== null){
                Storage::disk('public')->delete($user->picture);
            }
            $user->picture = $validate['picture'];
        }

        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->save();


        return redirect()->route('profile');
    }

    public function goToAddAnimal(){
        $user = Auth::user();

        if(! Gate::allows('isAdmin', $user)){
            abort(403);
        }

        return view('admin.add-animal');


    }
}
