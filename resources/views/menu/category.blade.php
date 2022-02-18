@extends('layouts.footer')

@extends('layouts.header')

@section('title','menu')

@section('content')

@if (Auth::check())
@include('layouts.navbar2')
@else
@include('layouts.navbar')
@endif

<h2 class="text-center my-5"> {{$category}}</h2>
    <div class="container text-center">
        <table class="mx-auto">
            <tbody>
                <tr>
            @foreach($items as $item)
                    <td class="px-5">
                        <a href="/item/{{$item->id}}">      
                            <img class="menuImage" src="{{$item->menu_pic}}" alt="no image"> 
                            <h3>{{$item->menu_name}}</h3>
                            <h3>{{$item->menu_price}}$</h3>
                        </a>
                    </td>              
            @endforeach  
                </tr>
            </tbody>
        </table>
    </div> 

@endsection
    
@extends('layouts.footer')
    


    
    
