<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::all();
        return view('main.include.listing.listings', compact('listings'));
    }


    public function create()
    {
        return view('main.include.listing.listing-create');
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


    public function destroy($id)
    {
        $userId = auth()->id();
        $shopIdForVerifyUser = Shop::whereUserId($userId)->get()->pluck('id');
        $shopIdForRouting = Listing::whereId($id)->get()->pluck('shop_id');

        //This verification process prevent that other users will not be able to delete each other listings
        if($shopIdForVerifyUser->all() == $shopIdForRouting->all()){
            $isDeleted = Listing::whereId($id)->delete();
            if($isDeleted){
                return redirect()->route('ilanlar.show',$shopIdForRouting->all())->with('success','İlanınız başarıyla silindi.');
            }else{
                return redirect()->route('ilanlar.show',$shopIdForRouting->all())->with('error','İlan silinirken bir hata meydana geldi.');
            }
        }else{
            abort(404);
        }

    }
}
