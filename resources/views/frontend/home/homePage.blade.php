@extends('frontend/layout/master')
@section('content')
{{-- 
    <link rel="stylesheet" href="{{asset('css/frontend/home/homePage.css')}}">
    <section class="hero">
        <h1>Welcome to My eCommerce Store</h1>
    </section>

    <section class="products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{asset('storage/images/product/'.$product->gallery_image)}}" alt="Product 1">
                    <h5>{{$product->name}}</h5>
                    <h5><strike>TK {{$product->selling_price}}</strike></h5>
                    <h5><strong> TK {{$product->selling_price-$product->discount}}</strong></h5>
                    <a href="#" class="btn btn-primary">View Details</a>
                    <button type="button" class="btn btn-success">Add to Cart</button>
                </div>
            @endforeach 
        </div>
    </section>
 --}}
 <link rel="stylesheet" href="{{asset('css/frontend/home/homePage.css')}}">
    <div class="main-container">
        <div class="product-category">
            <!-- Add your content for the dropdown page here -->
            <ul class="product-category-flex container">
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Agro</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Agro</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Agro</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Agro</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>
                <li><a href="">Agro</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Trees</a></li>
                <li><a href="">Vegetables</a></li>

            </ul>
        </div>
    </div>

@endsection
