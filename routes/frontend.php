<?php

use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Home\HomePageController;
use Illuminate\Support\Facades\Route;

    //Routes for frontends
    Route::get('/home',[HomePageController::class,'index'])->name('home');
    Route::get('/cart',[CartController::class,'index'])->name('cart');
?>