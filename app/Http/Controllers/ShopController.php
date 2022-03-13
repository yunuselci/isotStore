<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopPostRequest;
use App\Models\Shop;
use Exception;
use Illuminate\Http\Request;

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
        try {
            Shop::create([
                'name' => $request->name,
                'user_id' => $userId,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'image' => $imageName
            ]);
            return redirect()->route('dashboard')->with('success', 'Mağaza oluşturma isteği gönderildi, yetkililer tarafından incelentikten sonra onaylanacaktır.');

        }catch (Exception $exception){
            logger()->log('Low',$exception);
            return redirect()->route('magazalar.create')->with('error', 'Mağaza oluşturulurken bir hata meydana geldi.');

        }
    }

    public function show($id)
    {
        //$userShop = Auth::user()->whereId(Auth::id())->with('shops')->get();
        $shop = Shop::with('listings')->whereId($id)->paginate(5);
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
    public function adminShopList()
    {
        $userRole = Auth::user()->role;
        if($userRole == 2){
            $shops = Shop::Paginate(3);
            return view('main.include.admin.admin-shops', compact('shops'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Bu sayfayı görüntülemek için yetkiniz bulunmamaktadır.');
        }
    }

    public function shopStatusUpdate(Request $request,$id)
    {
        $userRole = Auth::user()->role;
        if($userRole == 2){
            $isShop = Shop::whereId($id);
            if($isShop){
                Shop::whereId($id)->update(['status'=>$request->status]);
                if($request->status == 1){
                    return redirect()->route('adminShopList')->with('success', 'Mağaza Onaylandı.');
                }
                else{
                    return redirect()->route('adminShopList')->with('success', 'Mağaza Onayı Kaldırıldı.');

                }
            }else{
                return redirect()->route('adminShopList')->with('error', 'Seçtiğiniz mağaza bulunamadı.');
            }
        }else{
            return redirect()->route('dashboard')->with('error', 'Bu sayfayı görüntülemek için yetkiniz bulunmamaktadır.');
        }
    }


    public function destroy($id)
    {
        $isShop = Shop::find($id);
        $userRole = Auth::user()->role;

        if($isShop && $userRole == 2){
            try {
                Shop::whereId($id)->delete();
                return redirect()->route('adminShopList')->with('success','Mağaza Silindi!');
            }catch (Exception $exception){
                logger()->log($exception);
                return redirect()->route('adminShopList')->with('error','Mağaza Silinemedi!');
            }
        }

    }
}
