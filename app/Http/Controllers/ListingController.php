<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::all();
        return view('main.include.listing.listings', compact('listings'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $listings = Listing::whereShopId($id)->with('category')->get();
        return view('main.include.listing.listing-page',compact('listings'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy()
    {
        //
    }
}
