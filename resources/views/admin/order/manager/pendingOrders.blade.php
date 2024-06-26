@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/order/manager/pendingOrders.css') }}">
    <div class="content-margin">

        <form action="{{route('search-orders',['status'=>$status])}}" method="POST">
            @csrf
            <div class="row form-row">
                <div class="col-md">
                    <h4>{{$status}} Orders List</h4>  
                </div>  
                <div class="search-area col-md">
                    <input type="text" class="form-control" name="search_field" id="">
                    <button type="submit" class="btn btn-primary search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="col-md">
                    <a href="{{route('orders',['status'=>$status])}}" class="btn btn-success default-btn">Show Default</a>
                </div> 
            </div> 
        </form>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Order No.</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Customer Address </th>
                        {{-- 
                        @if ($status=='pending')
                            <th scope="col">Select Supplier </th>
                        @endif
                         --}}
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($orders->isEmpty())
                        <td colspan="13"><h4 class="bg-danger">No Data Available</h4></td>
                    @else   
                        @foreach ($orders as $order)
                            <tr>
                                <form action="{{route('pending-approve',['order_id'=>$order->order_id])}}" method="post">
                                    @csrf
                                    <td scope="col">{{$order->order_id}}</td>
                                    <td scope="col">{{$order->delivery_status}}</td>
                                    <td scope="col">{{$order->order_date}}</td>
                                    <td scope="col">{{$order->total_price}}</td>
                                    <td scope="col"> {{$order->payments->payment_status}} </td>
                                    <td scope="col"> {{$order->payments->amount}} </td>
                                    <td scope="col"> {{$order->payments->due}} </td>
                                    <td scope="col"> {{$order->clients->area}} </td>
                                    {{-- 
                                    @if ($status=='pending')
                                        <td scope="col">
                                            <input type="text" name="order_id" value="{{$order->order_id}}" hidden>
                                            <div class="mb-3">
                                                <select class="form-select form-select-md" name="supplier" id="">
                                                    <option value="">Select Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($order->order_id == old('order_id'))
                                                    @error('supplier')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                @endif
                                            </div>
                                        </td>
                                    @endif --}}

                                    <td scope="col">
                                        <div class="actions">
                                            <a href="{{route('pending-order-details',['order_id'=>$order->order_id])}}" class="btn-group btn btn-primary">Details</a>
                                            {{-- 
                                            @if ($status=='pending')
                                                <button type="submit" class="btn btn-success btn-group ">Approve</button>
                                                <a href="{{route('pending-cancel',['order_id'=>$order->order_id])}}" class="btn-group btn btn-danger">Cancel</a>                                         
                                            @endif --}}

                                        </div>
                                    </td>
                                </form>
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
