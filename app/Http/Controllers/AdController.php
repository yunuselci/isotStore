<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function index()
    {
        $ads = Ad::with('products')->get();
        return view('theme.include.ads',compact('ads'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ad $ad)
    {
        //
    }


    public function edit(Ad $ad)
    {
        //
    }

    public function update(Request $request, Ad $ad)
    {
        //
    }

    public function destroy(Ad $ad)
    {
        //
    }
}
