<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        //
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
        $offers = Offer::with('shops')->where('shop_id',$id)->get();
        return view('main.include.offer.offers',compact('offers'));
    }


    public function edit(Offer $offer)
    {
        //
    }


    public function update(Request $request, Offer $offer)
    {
        //
    }


    public function destroy(Offer $offer)
    {
        //
    }
}
