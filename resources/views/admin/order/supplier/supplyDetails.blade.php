@extends('admin/layout/layout')

@section('content')
    
    <link rel="stylesheet" href="{{asset('css/admin/order/manager/OrderDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header ">
                @if ($order->delivery_status=='approved')
                    <h4 class="card-title">Supply Status: Pending</h4>
                @else
                    <h4 class="card-title">Supply Status: {{$order->delivery_status}}</h4>
                @endif
            </div>

            <div class="flex card-body"> 
                <div class="table-responsive products-details">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <div>
                                <h4>Products</h4>
                            </div>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Order Quantity</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
        
                        <tbody>
        
                            @foreach ($order->order_items as $order_item)
                                <tr>
                                    <td scope="col"><img src="{{asset('storage/images/product/'.$order_item->products->gallery_image)}}" alt="Not found"></td>
                                    <td scope="col">{{$order_item->products->name}}</td>
                                    <td scope="col">{{$order_item->products->selling_price}}</td>
                                    <td scope="col">{{$order_item->quantity}}</td>
                                    <td scope="col"><a href="#" class="btn-group btn btn-primary">Details</a></td>  
                                </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div> 

                <div class="table-responsive products-details">
                    <table class="table table-primary table-striped table-hover">
                        <thead>
                            <div class="payement-info">
                                <h4>Payment Info</h4>
                            </div>
                            <tr>
                                <th scope="col">Total Price</th>
                                <th scope="col">Paid Amount (Tk)</th>
                                <th scope="col">Due Amount (Tk)</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Banking Account</th>
                                <th scope="col">Transaction Id</th>
                                <th scope="col">Order time</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            <tr>
                                <td scope="col">{{$order->total_price}} </td>
                                <td scope="col">{{$order->payments->amount}}</td>
                                <td scope="col">{{$order->payments->due}}</td>
                                <td scope="col">{{$order->payments->payment_methods->name}}</td>
                                <td scope="col">{{$order->payments->banking_account}}</td>
                                <td scope="col">{{$order->payments->transaction_id}}</td>
                                <td scope="col">{{$order->payments->created_at}}</td>
                            </tr>
                        </tbody> 
                    </table>
                </div>




                <div class="customer-details-header">
                    <h4>Customer Info</h4>
                </div>

                <div class="row customer-details">
                    <div class="col-md">
                        <div class="info">
                            <h6>Name</h6>
                            <h5>{{$order->clients->name}}</h5>
                        </div>

                        <div class="info">
                            <h6>Phone No</h6>
                            <h5>{{$order->clients->phone}}</h5>
                        </div>

                        @if ($order->clients->phone2)
                            <div class="info">
                                <h6>Another Phone No</h6>
                                <h5>{{$order->clients->phone2}}</h5>
                            </div>      
                        @endif

                        @if ($order->clients->email)
                            <div class="info">
                                <h6>Email</h6>
                                <h5>{{$order->clients->email}}</h5>
                            </div> 
                        @endif
                    </div>

                    <div class="col-md">
                        @if ($order->clients->city)
                            <div class="info">
                                <h6>City/District</h6>
                                <h5>{{$order->clients->city}}</h5>
                            </div> 
                        @endif
                        @if ($order->clients->area)
                            <div class="info">
                                <h6>Upzilla/Area</h6>
                                <h5>{{$order->clients->area}}</h5>
                            </div> 
                        @endif

                        @if ($order->clients->zone)
                            <div class="info">
                                <h6>Union/Zone</h6>
                                <h5>{{$order->clients->zone}}</h5>
                            </div>    
                        @endif
                        
                        @if ($order->clients->location)
                            <div class="info">
                                <h6>Location</h6>
                                <h5>{{$order->clients->location}}</h5>
                            </div> 
                        @endif
                        
                    </div> 
                </div>

                @if ($order->delivery_status=='approved')
                    <div class="card last-card text-start">
                    <div class="card-body">
                        <div class="row supply-approve">
                            <div class="col-md">
                                <a href="{{route('receive-order',['order_id'=>$order->order_id])}}" class="btn-group btn btn-success receive">Recieve</a>                                         
                            </div>
                            <div class="col-md">
                                <a href="{{route('deny-order',['order_id'=>$order->order_id])}}" class="btn-group btn btn-danger receive">Deny</a>                                         
                            </div>
                                        
                        </div>
                    </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


