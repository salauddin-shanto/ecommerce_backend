@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/order/supplier/pendingSupplies.css') }}">
    <div class="content-margin">
        {{-- 
            <div class="form-upper-row"> 

                    <div class="table-title">
                        <h4> Supply {{$status}}</h4>  
                    </div>  
            
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <select class="form-select form-select-md" name="" id="">
                                    <option selected>Select Category</option>
                                    <option value="">New Delhi</option>
                                    <option value="">Istanbul</option>
                                    <option value="">Jakarta</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md">
                            <input type="text" class="form-control product-input" name="search_field" placeholder="search product">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success search-btn">Search Product</button>
                        </div>
                        <div class="col-md">
                            <a href="{{route('show-admins')}}" class="btn btn-success default-btn">Show Default</a>
                        </div> 
                    </div> 
                </form>
            </div>
        --}}

        <form action="{{route('search-supply',['status'=>$status])}}" method="POST">
            @csrf
            <div class="row form-row">
                <div class="col-md">
                    @if ($status=='approved')
                        <h4 scope="col">Pending Supply List</h4>
                    @else
                        <h4 scope="col">{{$status}} Supply List</h4>
                    @endif
                </div>  
                <div class="search-area col-md">
                    <input type="text" class="form-control" name="search_field" id="">
                    <button type="submit" class="btn btn-primary search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="col-md">
                    <a href="{{route('supply',['status'=>$status])}}" class="btn btn-success default-btn">Show Default</a>
                </div> 
            </div> 
        </form>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Order No.</th>
                        <th scope="col">Supply Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Customer Address </th>
                        {{--                         
                        @if ($status=='pending')
                            <th scope="col">Select Supplier </th>
                        @endif --}}
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($orders->isEmpty())
                        <td colspan="13"><h4 class="bg-danger">No Data Available</h4></td>
                    @else   
                        @foreach ($orders as $order)
                            <tr>
                                {{--<form action="{{route('receive-order',['order_id'=>$order->order_id])}}" method="post">
                                @csrf --}}
                                <td scope="col">{{$order->order_id}}</td>
                                @if ($order->delivery_status=='approved')
                                    <td scope="col">Pending</td>
                                @else
                                    <td scope="col">{{$order->delivery_status}}</td>
                                @endif
                                <td scope="col">{{$order->order_date}}</td>
                                <td scope="col">{{$order->total_price}}</td>
                                <td scope="col"> {{$order->payments->payment_status}} </td>
                                <td scope="col"> {{$order->payments->amount}} </td>
                                <td scope="col"> {{$order->payments->due}} </td>
                                <td scope="col"> {{$order->clients->area}} </td>
                                <td scope="col">
                                    <div class="actions">
                                        <a href="{{route('supply-order-details',['order_id'=>$order->order_id])}}" class="btn-group btn btn-primary">Details</a>
                                        @if ($status=='approved')
                                            <a href="{{route('receive-order',['order_id'=>$order->order_id])}}" class="btn-group btn btn-success">Recieve</a>                                         
                                            <a href="{{route('deny-order',['order_id'=>$order->order_id])}}" class="btn-group btn btn-danger">Deny</a>                                         
                                        @endif
                                    </div>
                                </td>
                        {{--     </form> --}}
                            </tr>     
                        @endforeach
                    @endif
                </tbody> 
            </table>
        </div>

        <div>
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
