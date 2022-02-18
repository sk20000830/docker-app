@extends('layouts.footer')

@extends('layouts.header')

@section('title','cart list')

@section('content')

@if (Auth::check())
@include('layouts.navbar2')
@else
@include('layouts.navbar')
@endif




    <div class="row mt-5">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 mx-auto mt-5">         
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th colspan="4" class="fs-3">
                            <i class="fas fa-shopping-cart"></i><span class="ms-3">SHOPPING CART</span> 
                        </th>            
                    </tr>
                    <tr>
                        <th>product</th>
                        <th>unit price</th>
                        <th>quantity</th>
                        <th>subtotal</th>
                    </tr>
                </thead>
            @if (empty($msg))
                <tbody>
                    
                        @foreach ($items as $item)
                            <tr>
                                <td>{{$item->menu_name}}</td>
                                <td>{{$item->menu_price}}$</td>
                                <form action="" method="POST"></form>
                                <td>
                                    <form action="{{route('cartlist_update')}}" method=POST>
                                        @csrf
                                        <input type="hidden" name="menu_id" value="{{$item->id}}">
                                        <input type="number" name="quantity" value="{{$quantity[$item->id]}}" class="quantity">
                                        <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td>{{$item->menu_price * $quantity[$item->id]}}$</td>
                            </tr>
                        @endforeach    
                </tbody>
            </table>

            <div colspan="4" class="text-center">
                                <a href="/" class="btn" style="width: 80px;"><i class="fas fa-plus-circle"></i></a>
            </div>  

            <table class="table table-borderd mt-4">
                    <!-- <tr>
                        <td><h3>subtotal</h3></td>
                        <td></td>
                        <td></td>
                        <td>$</td>
                    </tr> -->
                    <!-- <tr>
                        <td colspan=3><h3>delivery fee</h3></td>
                        <td>$</td>
                    </tr> -->
                    <tr>
                        <td colspan=3><h3>total</h3></td>
                        <td><span class="fs-3">{{$total}}$</span></td>
                    </tr>
                                        
            </table>    
            <div class="row mt-5">
                <div class="col-4">
                    <a href="/cartlist/remove" class="btn btn-danger w-25">Reset</a>
                </div>
                <div class="col-4 text-center">
                    <a href="/place-order" class="btn btn-warning w-50">Order</a>
                </div>
            </div>    
            @else
            <!-- <div colspan="4" class="text-center">
                     <a href="/" class="btn" style="width: 80px;"><i class="fas fa-plus-circle"></i></a>
            </div>   -->
            @endif
        </div>
    </div>

@endsection