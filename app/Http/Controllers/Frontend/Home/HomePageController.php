<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomePageController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('frontend/home/homePage',['products'=>$products]);
    }
}
