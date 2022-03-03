<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
Route::get('/kategoriler/{seflink}',[CategoryController::class,'seflink'])->name('seflink');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
