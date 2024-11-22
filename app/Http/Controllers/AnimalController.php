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

    public function getAllDetail(){
        $animals = Animal::paginate(15);
        return view('animals.detail',['animals' => $animals]);
    }

    public function getFormat(String $format){
        if ($format == 'compact'){
            $animals = Animal::paginate(20);
            return view('animals.compact',['animals' => $animals]);
        }else if ($format == 'detail'){
            $animals = Animal::paginate(15);
            return view('animals.detail',['animals' => $animals]);
        }
    }

    public function getAnimal(Request $request, String $format){
        if($format === 'detail'){
            $animals = Animal::where('name', 'LIKE', '%'.$request->animalName.'%')->paginate(15);
            return view('animals.detail', ['animals' => $animals]);
        }else if($format === 'compact'){
            $animals = Animal::where('name', 'LIKE', '%'.$request->animalName.'%')->paginate(20);
            return view('animals.compact', ['animals' => $animals]);
        }
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
