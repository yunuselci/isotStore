<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopPostRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $shops = Shop::with('ads')->get();
        return view('theme.include.shops',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $shop = Shop::with('products')->whereId($id)->get();
        if($shop){
            return view('theme.include.shop-page',compact('shop'));
        }else{
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $shop = Shop::find($id)->get();
        if($shop){
            return view('theme.include.shop-edit',compact('shop'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = auth()->id();
        if(!is_null($request->image)){
            $imageName = "iSotStore_".rand(0,10000).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('theme/images/shop'), $imageName);
        }else{
            $imageName = Shop::find($id)->image;
        }
        $shop = Shop::whereId($id)->update([
            'name' => $request->name,
            'user_id'=> $userId,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
            'image' => $imageName

        ]);
        if($shop){
            return redirect()->route('shopEdit')->with('success','Mağaza bilgileri başarıyla kaydedildi.');
        }else{
            return redirect()->route('shopEdit')->with('error','Bir hata meydana geldi.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
