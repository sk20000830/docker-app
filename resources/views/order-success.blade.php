@extends('layouts.footer')

@extends('layouts.header')

@section('title','order-success')

@section('content')

@if (Auth::check())
@include('layouts.navbar2')
@else
@include('layouts.navbar')
@endif   
    
    
    


    <div class="row mt-5">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 mx-auto mt-5">  
            <h1 class="my-5 mx-auto text-center">Thank you very much !!!</h1>       
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>product</th>
                        <th>unit price</th>
                        <th>quantity</th>
                        <th>subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            <td>{{$item->menus->menu_name}}</td>
                            <td>{{$item->menus->menu_price}}$</td>
                            <form action="" method="POST"></form>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->menus->menu_price * $item->quantity}}$</td>
                        </tr>
                    @endforeach  
                        <!-- <tr>
                                <td colspan=3><h3>total</h3></td>
                                <td><span class="fs-3">$</span></td>
                        </tr>   -->
                </tbody>                                    
            </table>    
        </div>
    </div>


@endsection