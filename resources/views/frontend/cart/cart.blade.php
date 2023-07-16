@extends('frontend/layout/master')

@section('content')
    <link rel="stylesheet" href="{{asset('css/frontend/cart/cart.css')}}">
    <div class="cart">
        <div class="cart-items">
            <h2>Shopping Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart items dynamically generated -->
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td>
                                <input type="checkbox" class="product-checkbox">
                            </td>
                            <td>
                                <div class="product-info">
                                    <img src="product1.jpg" alt="Product 1">
                                    <div class="product-details">
                                        <h4>Product 1</h4>
                                        <p>SKU: 123456</p>
                                    </div>
                                </div>
                            </td>
                            <td>$29.99</td>
                            <td>
                                <div class="quantity">
                                    <button class="btn-quantity minus">-</button>
                                    <input type="number" min="1" value="1">
                                    <button class="btn-quantity plus">+</button>
                                </div>
                            </td>
                            <td>$29.99</td>
                            <td>
                                <a href="#" class="btn-remove">Remove</a>
                            </td>
                        </tr>
                    @endfor

                    <!-- Add more rows for additional cart items -->
                </tbody>
            </table>
        </div>

        <div class="cart-total">
            <div class="cart-summary">
                <p>Subtotal: $29.99</p>
                <p>Tax: $3.60</p>
                <p class="total">Total: $33.59</p>
            </div>
            <div class="cart-buttons">
                <a href="#" class="btn">Continue Shopping</a>
                <a href="#" class="btn">Checkout</a>
            </div>
        </div>

    </div>  
@endsection