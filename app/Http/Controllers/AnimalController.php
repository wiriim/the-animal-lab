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
        $comments = Comment::where('animal_id', $animal->id)
        ->orderBy('created_at','desc')->paginate(15);
        return view('pages.read-more', [
            'animal'=> $animal,
            'comments' => $comments,
            ]);
    }
}
