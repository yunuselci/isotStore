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


    public function show(Listing $listing)
    {
        //
    }


    public function edit(Listing $listing)
    {
        //
    }


    public function update(Request $request, Listing $listing)
    {
        //
    }


    public function destroy(Listing $listing)
    {
        //
    }
}
