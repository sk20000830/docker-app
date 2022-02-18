<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Traits\CartTrait;
// use Illuminate\Http\Request;


class CartService{

    use CartTrait;

    public function payment($request){

        $user = Auth::user();

        //セッションに'cartData'が存在するかチェック
        if($request->session()->has('cartData')){

            $sessionCartData = $request->session()->get('cartData');

            //$sessionCartDataのkeyであるmenu_idを配列で取り出す。
            // Menuモデルから全てのmenu_idのデータを取得'cartData'から$quantityを取り出し、’CartTrait.php’内のgetTotalPriceメソッドを呼び出す
            $menu_ids = array_keys($sessionCartData);
            $items = Menu::whereIn('id', $menu_ids)->get();
            $quantity = $request->session()->get('cartData');
            $total = $this->getTotalPrice($quantity, $items);

            return compact('user', 'items', 'quantity', 'total');        

        }else{
            return ['user' => $user, 'msg' => 'false'];
        }
    }

    public function saveToCart($request){

        $sessionCartData = $request->session()->get('cartData');
        
        // session内に同じmenuがないかをidにてチェック。あれば足し、なければそのまま保存
        if(isset($sessionCartData[$request->menu_id])){

            $sessionCartData[$request->menu_id] = (int)$sessionCartData[$request->menu_id] + (int)$request->quantity;
            
        }else{

            $sessionCartData[$request->menu_id] = (int)$request->quantity;
        }
        
        $request->session()->put('cartData', $sessionCartData);
    }

    public function updateCart($request){

        $sessionCartData = $request->session()->get('cartData');

        if($request->quantity > 0)
        {
            $sessionCartData[$request->menu_id] = (int)$request->quantity;

        }
        else
        {
            unset($sessionCartData[$request->menu_id]);

        }

        $request->session()->put('cartData', $sessionCartData);

    }
}