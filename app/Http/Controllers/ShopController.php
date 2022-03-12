<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopPostRequest;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::with('listings')->paginate(9);
        return view('main.include.shop.shops', compact('shops'));
    }

    public function create()
    {
        $userId = auth()->id();

        $shops = Shop::whereUserId($userId)->get();
        foreach ($shops as $shop) {
            if ($shop && !is_null($shop->status)) {
                return redirect()->route('dashboard')->with('error', 'Mevcut mağaza açma talebiniz bulunmaktadır, yönetici onayı bekleniyor.');
            }
        }
        return view('main.include.shop.shop-create');
    }

    public function store(ShopPostRequest $request)
    {
        $userId = auth()->id();
        if (!is_null($request->image)) {
            $imageName = "iSotStore_" . rand(0, 10000) . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/shop'), $imageName);
        } else {
            $imageName = $request->image;
        }
        $shop = Shop::create([
            'name' => $request->name,
            'user_id' => $userId,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
            'image' => $imageName
        ]);
        if ($shop) {
            return redirect()->route('dashboard')->with('success', 'Mağaza oluşturma isteği gönderildi, yetkililer tarafından incelentikten sonra onaylanacaktır.');

        } else {
            return redirect()->route('magazalar.create')->with('error', 'Mağaza oluşturulurken bir hata meydana geldi.');

        }


    }

    public function show($id)
    {
        $userShop = Auth::user()->whereId(Auth::id())->with('shops')->first();

        $shop = Shop::with('listings')->whereId($userShop->shops->id)->paginate(5);
        foreach ($shop as $s){
            if ($s->status == 1) {
                return view('main.include.shop.shop-page', compact('shop'));
            } else {
                abort(404);
            }
        }



    }

    public function edit($id)
    {
        $shop = Shop::find($id);
        $userId = auth()->id();

        if ($shop && $shop->status == 1) {
            $shop = Shop::find($id)->whereUserId($userId)->get();
            return view('main.include.shop.shop-edit', compact('shop'));
        } else {
            abort(404);
        }
    }

    public function update(ShopPostRequest $request, $id)
    {
        $userId = auth()->id();
        if (!is_null($request->image)) {
            $imageName = "iSotStore_" . rand(0, 10000) . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/shop'), $imageName);
        } else {
            $imageName = Shop::find($id)->image;
        }
        $isShop = Shop::whereId($id);
        if ($isShop) {
            Shop::whereId($id)->update([
                'name' => $request->name,
                'user_id' => $userId,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'image' => $imageName

            ]);
            return redirect()->route('magazalar.edit', $id)->with('success', 'Mağaza bilgileri başarıyla kaydedildi.');
        } else {
            return redirect()->route('magazalar.edit', $id)->with('error', 'Bir hata meydana geldi.');

        }

    }

    public function destroy(Shop $shop)
    {
        //
    }
}
