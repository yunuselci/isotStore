<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

//categories
Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
Route::get('/kategoriler/{seflink}',[CategoryController::class,'detail'])->name('categoryDetail');

//ads
Route::get('/ilanlar',[ListingController::class,'index'])->name('listings');
Route::get('/ilan/{seflink}',[ListingController::class,'detail'])->name('listingDetail');

//shop

Route::get('/magazalar',[ShopController::class,'index'])->name('shops');
Route::get('/magaza/{id}',[ShopController::class,'show'])->name('magazalar.show');




Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('/profil',function (){
        return view('main.include.profile.dashboard');
    })->name('dashboard');

    Route::get('/profil/sifre-degis',function (){
        return view('main.include.profile.update-password');
    })->name('passwordUpdate');


    //Admin
    Route::get('admin/magazalar', [ShopController::class,'adminShopList'])->name('adminShopList');
    Route::put('admin/magazalar/{id}', [ShopController::class,'shopStatusUpdate'])->name('adminShopStatusUpdate');
    Route::delete('admin/magazalar/{id}', [ShopController::class,'destroy'])->name('adminShopDelete');
    Route::put('profil/admin/{id}',[UserController::class,'beAdmin'])->name('beAdmin');

    //shops
    Route::get('/magazalar/arama',[ShopController::class,'search'])->name('shop.search');

    Route::resource('magazalar', ShopController::class)->except([
        'index'
    ]);

    //listings
    Route::get('/ilanlar/arama',[ListingController::class,'search'])->name('listing.search');

    Route::resource('ilanlar',ListingController::class)->except([
       'index'
    ]);
    Route::resource('teklifler', OfferController::class);


});
