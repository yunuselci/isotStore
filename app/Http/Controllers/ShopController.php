<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopPostRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::with('listings')->get();
        return view('main.include.shops',compact('shops'));
    }

    public function create()
    {
        $userId = auth()->id();

        $shops = Shop::whereUserId($userId)->get();
        foreach ($shops as $shop){
            if($shop){
                if(!is_null($shop->status)){
                    return redirect()->route('dashboard')->with('error','Mevcut mağaza açma talebiniz bulunmaktadır, yönetici onayı bekleniyor.');
                }
            }
        }
        return view('main.include.shop-create');
    }

    public function store(ShopPostRequest $request)
    {
        $userId = auth()->id();
        if(!is_null($request->image)){
            $imageName = "iSotStore_".rand(0,10000).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/shop'), $imageName);
        }else{
            $imageName = $request->image;
        }
        $shop = Shop::create([
            'name' => $request->name,
            'user_id'=> $userId,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
            'image' => $imageName
        ]);
        if($shop)
        {
            return redirect()->route('dashboard')->with('success','Mağaza oluşturma isteği gönderildi, yetkililer tarafından incelentikten sonra onaylanacaktır.');

        }else{
            return redirect()->route('magazalar.create')->with('error','Mağaza oluşturulurken bir hata meydana geldi.');

        }


    }

    public function show($id)
    {
        $shop = Shop::with('listings')->whereId($id)->get();
        if($shop){
            return view('main.include.shop-page',compact('shop'));
        }else{
            abort(404);
        }

    }

    public function edit($id)
    {
        $shop = Shop::find($id);
        if($shop){
            $shop = Shop::find($id)->get();

            return view('main.include.shop-edit',compact('shop'));
        }else{
            abort(404);
        }
    }

    public function update(ShopPostRequest $request, $id)
    {
        $userId = auth()->id();
        if(!is_null($request->image)){
            $imageName = "iSotStore_".rand(0,10000).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('main/images/shop'), $imageName);
        }else{
            $imageName = Shop::find($id)->image;
        }
        $isShop = Shop::whereId($id);
        if($isShop){
            Shop::whereId($id)->update([
                'name' => $request->name,
                'user_id'=> $userId,
                'email'=> $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'image' => $imageName

            ]);
            return redirect()->route('magazalar.edit',$id)->with('success','Mağaza bilgileri başarıyla kaydedildi.');
        }
        else{
            return redirect()->route('magazalar.edit',$id)->with('error','Bir hata meydana geldi.');

        }

    }

    public function destroy(Shop $shop)
    {
        //
    }
}
