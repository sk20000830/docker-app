@extends('layouts.footer')

@extends('layouts.header')

@section('title','menu')

@section('content')

@if (Auth::check())
@include('layouts.navbar2')
@else
@include('layouts.navbar')
@endif




    <h1 class="text-center my-5"> {{$items->menu_name}}</h1>
    <div class="container text-center mx-auto w-50 my-5">
        <img class="w-50" src="{{$items->menu_pic}}" alt="no image"> 
        <h1 class="text-center my-5">{{$items->menu_price}}$</h1>
        <div class="alert alert-warning my-5 pb-5 mx-auto w-75">
            <p class="text-black fw-bold">ingredient</p>
            <h4 >{{$items->ingredient}}</h4>
        </div>
@if (Auth::check())
        <form action="{{ route('cartlist_store')}}" method="POST">
        @csrf
            <input type="number" name="quantity" value="1" class="quantity">
            <input type="hidden" name="price" value="{{$items->menu_price}}">
            <input type="hidden" name="menu_id" value="{{$items->id}}">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input type="submit" name="sub" value="Add to Cart">
        </form>
@else
        <a href="/login" class="btn btn-success">Login to Order</a>
@endif
    </div> 

    <br><br>

@endsection
    

    


    
    
