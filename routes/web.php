<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\CartController;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/shop/{product}', [ShopController::class, 'show'])
    ->name('shop.show');
    Route::post('/cart/items', [CartController::class, 'add'])
    ->name('cart.items.add');
