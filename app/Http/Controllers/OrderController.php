<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Services\OrderService;

class OrderController extends Controller
{

    private $order_service;

    public function placeOrder(OrderService $order_service, Request $request)
    {
        $user= Auth::user();

        $orderId = $order_service->saveOrderData($request);
        
        return redirect()->route('order-success', ['orderId' => $orderId]);
    }

    public function orderSuccess(OrderService $order_service, Request $request)
    {
        $user= Auth::user();

        $orderData = $order_service->getOrderData($request);

        return view('order-success',['datas' => $orderData, 'user' => $user]);
    }
}
