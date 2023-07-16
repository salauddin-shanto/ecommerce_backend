<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('frontend/cart/cart',['products'=>$products]);
    }
}
