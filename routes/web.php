<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\MenuController@index')->name('index');

Route::get('/category/{category}', 'App\Http\Controllers\MenuController@category');

Route::get('/item/{item}', 'App\Http\Controllers\MenuController@item');

Route::get('/cartlist', 'App\Http\Controllers\CartController@index')->name('cartlist_index');

Route::post('/cartlist', 'App\Http\Controllers\CartController@store')->name('cartlist_store');

Route::post('cartlist/update', 'App\Http\Controllers\CartController@update')->name('cartlist_update');

Route::get('/cartlist/remove', 'App\Http\Controllers\CartController@destroy')->name('cartlist_remove');

Route::get('/place-order', 'App\Http\Controllers\OrderController@placeOrder');

Route::get('/order-success', 'App\Http\Controllers\OrderController@orderSuccess')->name('order-success');



require __DIR__.'/auth.php';
