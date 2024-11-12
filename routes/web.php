<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', [AnimalController::class, 'index'])->name('home');

Route::get('/animals', [AnimalController::class, 'getAllAnimals'])->name('animals');

