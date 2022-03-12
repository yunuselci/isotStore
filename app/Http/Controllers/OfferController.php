<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferPostRequest;
use App\Models\Offer;
use App\Models\Shop;
use Exception;
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


    public function store(OfferPostRequest $request)
    {
        try {
            Offer::create([
                'user_name' => $request->user_name,
                'user_phone' => $request->user_phone,
                'user_email' => $request->user_email,
                'description' => $request->description,
                'shop_id' => $request->shop_id,
            ]);
            return redirect()->back()->with('success', 'Teklif isteğiniz başarıyla gönderildi.');

        } catch (Exception $e) {

            logger()->info($e);
            return redirect()->back()->with('error', 'Teklif isteğiniz gönderilirken bir hata meydana geldi.');

        }
    }


    public function show($id)
    {
        $offers = Offer::with('shops')->where('shop_id', $id)->get();
        return view('main.include.offer.offers', compact('offers'));
    }


    public function edit(Offer $offer)
    {
        //
    }


    public function update(OfferPostRequest $request, $id)
    {
        try {
            Offer::whereId($id)->update([
                'user_name' => $request->user_name,
                'user_phone' => $request->user_phone,
                'user_email' => $request->user_email,
                'description' => $request->description,
                'status' => $request->status,
                'shop_id' => $request->shop_id,
            ]);
            return redirect()->back()->with('success', 'Teklifi okundu olarak işaretlendiz.');
        }
        catch (Exception $e){
            logger()->info($e);
            return redirect()->back()->with('error', 'Bir hata meydana geldi.');

        }

    }


    public function destroy(Offer $offer)
    {
        //
    }
}
