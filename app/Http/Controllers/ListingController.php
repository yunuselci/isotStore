<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListPostRequest;
use App\Models\Listing;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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

    public function seflink($seflink)
    {
        return view('main.include.listing.listing-detail', compact('seflink'));
    }

    public function store(ListPostRequest $request)
    {
        $userId = auth()->id();
        $shop = Shop::whereUserId($userId)->first();
        $seflink = Str::slug($request->name);

        if (!is_null($request->image)) {
            $imageName = "iSotStore_" . rand(0, 10000) . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/listing'), $imageName);
        } else {
            $imageName = $request->image;
        }
        $listing = Listing::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=> $imageName,
            'unit' => $request->unit,
            'type'=> $request->type,
            'status' => $request->status,
            'delivery_status' => $request->delivery_status,
            'faulty' => $request->faulty,
            'origin'=> $request->origin,
            'seflink'=> $seflink,
            'shop_id' => $shop->id,
            'category_id'=> $request->category_id,
        ]);
        if($listing)
        {
            return redirect() -> route('ilanlar.create')->with('success','İlan başarıyla eklendi.');
        }else{
            return redirect() -> route('ilanlar.create')->with('error','İlan eklenirken bir hatayla karşılaşıldı.');
        }

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
