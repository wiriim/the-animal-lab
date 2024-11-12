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
        $animals = Animal::all();
        return view('pages.animals',['animals' => $animals]);
    }
}
