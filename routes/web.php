<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;



Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
Route::get('/kategoriler/{seflink}',[CategoryController::class,'seflink'])->name('seflink');
Route::get('/ilanlar',[AdController::class,'index'])->name('ads');
Route::get('/mağazalar',[ShopController::class,'index'])->name('shops');


Route::middleware(['auth:sanctum', 'verified'])->get('/profil', function () {
    return view('theme.include.dashboard');
})->name('dashboard');

