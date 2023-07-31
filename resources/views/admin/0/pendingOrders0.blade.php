@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/order/admin/pendingOrders.css') }}">
    <div class="content-margin">
        <div class="form-upper-row"> 

            <div class="table-title">
                <h4>Pending Orders List</h4>  
            </div>  
            
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                      <input type="text" class="form-control" name="search_field" id="">
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-success search-btn">Search</button>
                    </div>
                    <div class="col-md">
                        <a href="{{route('show-admins')}}" class="btn btn-success default-btn">Show Default</a>
                    </div> 
                </div> 
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Customer Address </th>
                        <th scope="col">Select Supplier </th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            <td scope="col">{{$order->order_date}}</td>
                            <td scope="col">{{$order->total_price}}</td>
                            <td scope="col"> {{$order->payment_status}} </td>
                            <td scope="col"> {{$order->payments->amount}} </td>
                            <td scope="col"> {{$order->payments->due}} </td>
                            <td scope="col"> {{$order->clients->area}} </td>
                            <td scope="col">
                                <div class="mb-3">
                                    <select class="form-select form-select-md" name="" id="">
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td scope="col">
                                <div class="actions">
                                    <a href="{{route('pending-order-details',['order_id'=>$order->order_id])}}" class="btn-group btn btn-primary">Details</a>
                                    <a href="#" class="btn-group btn btn-success">Approve</a>
                                    <a href="#" class="btn-group btn btn-danger">Cancel</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody> 
            </table>
        </div>
    </div>
@endsection
