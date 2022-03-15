<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListPostRequest;
use App\Models\Listing;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ListingController extends Controller
{

    public function index()
    {

        $listings = Listing::with('shops')->paginate(9);

        return view('main.include.listing.listings', compact('listings'));


    }


    public function create()
    {
        $userShop = Auth::user()->whereId(Auth::id())->with('shops')->first();
        if ($userShop->shops->status == 1) {
            return view('main.include.listing.listing-create');
        } else {
            abort(404);
        }
    }

    public function detail($seflink)
    {

        $listing = Listing::with('shops')->where('seflink', $seflink)->first();
        if ($listing) {
            return view('main.include.listing.listing-detail', compact('listing'));
        } else {
            abort(404);
        }
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
        try {
            Listing::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imageName,
                'unit' => $request->unit,
                'type' => $request->type,
                'status' => $request->status,
                'delivery_status' => $request->delivery_status,
                'faulty' => $request->faulty,
                'origin' => $request->origin,
                'seflink' => $seflink,
                'shop_id' => $shop->id,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('ilanlar.create')->with('success', 'İlan başarıyla eklendi.');

        } catch (Exception $exception) {
            logger()->info( $exception);
            return redirect()->route('ilanlar.create')->with('error', 'İlan eklenirken bir hatayla karşılaşıldı.');
        }

    }


    public function show($id)
    {
        $userShop = Auth::user()->whereId(Auth::id())->with('shops')->first();
        if ($userShop->shops->status == 1) {
            $listings = Listing::whereShopId($userShop->shops->id)->with('category')->paginate(3);
            return view('main.include.listing.listing-page', compact('listings'));
        } else {
            abort(404);
        }

    }


    public function edit($id)
    {
        $listing = Listing::find($id);
        $userShop = Auth::user()->whereId(Auth::id())->with('shops')->first();
        if ($listing && $listing->shop_id == $userShop->shops->id ) {
            try {
                $listing = Listing::whereId($id)->get();
                return view('main.include.listing.listing-edit', compact('listing'));
            }catch (Exception $exception){
                logger()->info($exception);
                return redirect()->back()->with('error', 'Bir hata meydana geldi');
            }
        } else {
            abort(404);
        }
    }


    public function update(ListPostRequest $request, $id)
    {
        $userId = auth()->id();
        $shop = Shop::whereUserId($userId)->first();
        $seflink = Str::slug($request->name);

        if (!is_null($request->image)) {
            $imageName = "iSotStore_" . rand(0, 10000) . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/listing'), $imageName);
        } else {
            $imageName = Listing::find($id)->image;
        }
        $isListing = Listing::whereId($id);
        if ($isListing) {
            try {
                Listing::whereId($id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'image' => $imageName,
                    'unit' => $request->unit,
                    'type' => $request->type,
                    'status' => $request->status,
                    'delivery_status' => $request->delivery_status,
                    'faulty' => $request->faulty,
                    'origin' => $request->origin,
                    'seflink' => $seflink,
                    'shop_id' => $shop->id,
                    'category_id' => $request->category_id,
                ]);
                return redirect()->route('ilanlar.edit', $id)->with('success', 'İlan bilgileri başarıyla güncellendi');
            } catch (Exception $exception){
                logger()->info($exception);
                return redirect()->back()->with('error', 'Bir hata meydana geldi');
            }
        } else {
            return redirect()->route('ilanlar.edit', $id)->with('error', 'Bir hata meydana geldi');
        }


    }


    public function destroy($id)
    {
        $userId = auth()->id();
        $shopIdForVerifyUser = Shop::whereUserId($userId)->get()->pluck('id');
        $shopIdForRouting = Listing::whereId($id)->get()->pluck('shop_id');

        //This verification process prevent that other users will not be able to delete each other listings
        if ($shopIdForVerifyUser->all() == $shopIdForRouting->all()) {
            try {
                Listing::whereId($id)->delete();
                return redirect()->route('ilanlar.show', $shopIdForRouting->all())->with('success', 'İlanınız başarıyla silindi.');

            }catch (Exception $exception){
                logger()->info($exception);
                return redirect()->route('ilanlar.show', $shopIdForRouting->all())->with('error', 'İlan silinirken bir hata meydana geldi.');
            }
        } else {
            abort(404);
        }

    }

    public function search(Request $request){

        $search = $request->input('search');

        $listings = Listing::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->paginate(5);

        return view('main.include.listing.listings', compact('listings'));
    }
}
