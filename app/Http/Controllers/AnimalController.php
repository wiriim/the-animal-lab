<?php

namespace App\Http\Controllers;

use App\Models\Animal;
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
        return view('pages.read-more', ['animal'=> $animal]);
    }
}
