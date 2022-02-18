<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function all(Request $request)
    {
        $user= Auth::user();
        
        $items = Menu::all();
        return view('menu', ['items' => $items, 'user' => $user]);
    }

    public function index(Request $request)
    {
        // session()->flush();

        $user= Auth::user();

        $mains = Menu::where('category', 'main')->get();
        $sides = Menu::where('category', 'side')->get();
        $deserts = Menu::where('category', 'desert')->get();
        $drinks = Menu::where('category', 'drink')->get();
        return view('menu.index', ['user' => $user, 'mains' => $mains, 'sides' => $sides, 'deserts' => $deserts, 'drinks' => $drinks]);
    }

    public function category(Request $request, string $category)
    {
        $user= Auth::user();

        $items = Menu::where('category', $category)->get();
        return view('menu.category', ['user' => $user, 'items' => $items, 'category' => $category]);
    }

    public function item(Request $request, int $item)
    {
        $user= Auth::user();

        $items = Menu::where('id', $item)->first();
        return view('menu.item', ['user' => $user, 'items' => $items]);
    }

    // public function showCart(Request $request)
    // {
    //     $user= Auth::user();
        
    //     $items[$menu_ids] = Menu::whereIn('id', $request->menu_ids)->get();
    //     return route('App\Http\Controllers\CartController@index', ['items' => $items, 'user' => $user]);
    // }

}
