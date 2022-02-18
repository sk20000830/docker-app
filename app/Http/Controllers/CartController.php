<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{

    private $cart_service;
    // public function __construct(PriceService $price_service)
    // {
    //     $this->price = $price_service;
    // }
    
    public function index(CartService $cart_service, Request $request)
    {
        
        $result = $cart_service->payment($request);

        return view('cart', $result);

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
    public function store(Cartservice $cart_service, Request $request)
    {
        $cart_service->saveToCart($request);

        return redirect()->route('cartlist_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cartservice $cart_service, Request $request)
    {
        $cart_service->updateCart($request);
        return redirect()->route('cartlist_index');
    }

    public function destroy(Request $request)
    {
        $user= Auth::user();
        $request->session()->remove('cartData');

        return view('cart', ['user' => $user, 'msg' => 'false']);
    }
}
