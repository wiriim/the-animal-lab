<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', [AnimalController::class, 'index'])->name('home');

Route::get('/animals', [AnimalController::class, 'getAllAnimals'])->name('animals');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'authenticate']);

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

