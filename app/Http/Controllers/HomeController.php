<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $shops = Shop::with('listings')->paginate(3);
        return view('main.include.home', compact('shops'));
    }
}
