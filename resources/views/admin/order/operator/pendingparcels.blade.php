@extends('admin/layout/layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/order/supplier/pendingSupplies.css') }}">
    <div class="content-margin">

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Parcel No</th>
                        <th scope="col">Parcel Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Due Amount</th>
                        <th scope="col">Customer Contact</th>
                        <th scope="col">Customer's City/ District </th>
                        <th scope="col">Area/Upazilla </th>
                        <th scope="col">Zone/Union </th>
                        <th scope="col">Location/Village </th>
                       
                   
                        <th scope="col">                  
                            @if ($status=='processed' || $status=='received by courier manager' || $status=='sent to courier' )
                                Actions
                            @endif
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @if ($orders->isEmpty())
                        <td colspan="13"><h4 class="bg-danger">No Data Available</h4></td>
                    @else   
                        @foreach ($orders as $order)
                            <tr>
                                <td scope="col">{{$order->order_id}}</td>
                                <td scope="col">{{$order->delivery_status}}</td>
                                <td scope="col">{{$order->order_date}}</td>
                                <td scope="col">{{$order->total_price}}</td>
                                <td scope="col">{{$order->payments->payment_status}} </td>
                                <td scope="col">{{$order->payments->amount}} </td>
                                <td scope="col">{{$order->payments->due}} </td>
                                <td scope="col">{{$order->clients->phone}} </td>
                                <td scope="col">{{$order->clients->city}}</td>
                                <td scope="col">{{$order->clients->area}}</td>
                                <td scope="col">{{$order->clients->zone}}</td>
                                <td scope="col">{{$order->clients->location}}</td>
                                <td scope="col">
                                    <div class="actions">
                                        @if ($status=='processed')
                                            <a href="{{route('receive-parcel',['order_id'=>$order->order_id])}}" class="btn-group btn btn-success">Recieve</a>                                         
                                        @elseif($status=='received by courier manager')
                                            <a href="{{route('parcel-sent-to-courier',['order_id'=>$order->order_id])}}" class="btn-group btn btn-success">Sent to courier</a>                                         
                                        @elseif($status=='sent to courier')
                                            <a href="{{route('parcel-delivered-to-customer',['order_id'=>$order->order_id])}}" class="btn-group btn btn-success">Delivered</a>                                         
                                            <a href="{{route('parcel-returned',['order_id'=>$order->order_id])}}" class="btn-group btn btn-danger">Returned</a>                                         
                                        @endif
                                        
                                    </div>
                                </td>
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
