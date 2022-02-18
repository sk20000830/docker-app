<?php 
namespace App\Traits;
use App\Models\Menu;

trait CartTrait
{
    
    public function getTotalPrice($quantity, $items)
    {
        $total = 0;

        // $itemsから'menu_price'のみを取り出し、'menu_id'をkeyとする配列に代入
        foreach($items as $key => $item){

            $priceData[$item->id] = $item->menu_price;

        }

        //カート内商品の合計金額を計算
        foreach($quantity as $menu_id => $q){            
            
            $subtotal = $priceData[$menu_id] * $q;

            $total += $subtotal;
        }

        return $total;
    }
}