<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
Route::get('/kategoriler/{seflink}',[CategoryController::class,'seflink'])->name('seflink');
Route::get('/ilanlar',[AdController::class,'index'])->name('ads');

Route::get('/profil/duzenle',function (){
   return view('theme.include.edit-profile');
})->name('edit.profile');
Route::get('/profil/sifre-degis',function (){
   return view('theme.include.update-password');
})->name('update.password');

Route::middleware(['auth:sanctum', 'verified'])->get('/profil', function () {
    return view('theme.include.dashboard');
})->name('dashboard');

