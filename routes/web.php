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

//categories
Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
Route::get('/kategoriler/{seflink}',[CategoryController::class,'seflink'])->name('seflink');

//ads
Route::get('/ilanlar',[AdController::class,'index'])->name('ads');

//shop

Route::get('/magazalar',[ShopController::class,'index'])->name('shops');
//Route::get('/profil/magazam/{id}',[ShopController::class,'show'])->name('shopPage');


Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('/profil',function (){
        return view('theme.include.dashboard');
    })->name('dashboard');
    Route::resource('magazalar', ShopController::class)->except([
        'index'
    ]);


});
