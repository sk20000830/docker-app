<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Traits\CartTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



    class OrderService
    {

        public function saveOrderData($request)
        {
            $user= Auth::user();
        
            // トランザクション開始
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $user->id
            ]);
        
            // セッションからカートデータを取得
            $quantity = $request->session()->get('cartData');
            // 日付取得
            $date = Carbon::now(); 
            // keyをtableのカラム名と一致させ、直接insertするための連想配列を作成
            foreach($quantity as $menuId => $q)
            {
                $data[] = 
                    array('menu_id' => $menuId, 'quantity' => $q, 'order_id' => $order->id, 'created_at' => $date, 'updated_at' => $date);
            }
            
            $data = OrderDetail::insert($data); 

            // トランザクション終了
            DB::commit();

            //cartDataをセッションから削除
            $request->session()->remove('cartData');

            return $order->id;
            

        }

        public function getOrderData($request)
        {
           

            $orderData = OrderDetail::where('order_id', $request->orderId)->get();

            return $orderData;

            
        }

    }