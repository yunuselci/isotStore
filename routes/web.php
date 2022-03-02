<?php

use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('theme.include.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
