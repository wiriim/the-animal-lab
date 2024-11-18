<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function getAllAnimals(){
        $animals = Animal::paginate(15);
        return view('pages.animals',['animals' => $animals]);
    }

    public function readMore(Animal $animal){
        $user_id = Auth::user()->id;
        $comments = Comment::where('user_id', '===', $user_id);
        return view('pages.read-more', [
            'animal'=> $animal,
            'comments' => $comments,
            ]);
    }
}
