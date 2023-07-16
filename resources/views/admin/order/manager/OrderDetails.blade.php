@extends('admin/layout/layout')

@section('content')
    
    <link rel="stylesheet" href="{{asset('css/admin/order/manager/OrderDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Order Status: {{$order->delivery_status}}</h4>
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

                @if ($order->delivery_status=='pending')
                    <form action="{{route('pending-approve',['order_id'=>$order->order_id])}}" method="post">
                        @csrf
                        <div class="approve-section row">
                            <div class="col-md">
                                <select class="form-select form-select-md" name="supplier" id="">
                                    <option value="">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>

                                @error('supplier')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="actions">
                                    <button type="submit" class="btn btn-success btn-group ">Approve</button>
                                    <a href="{{route('pending-cancel',['order_id'=>$order->order_id])}}" class="btn-group btn btn-danger">Cancel</a>                                          
                                </div>
                            </div>
                        </div>
                    </form>

                @elseif ($order->delivery_status=='cancelled')
                    <form action="{{route('pending-approve',['order_id'=>$order->order_id])}}" method="post">
                        @csrf
                        <div class="approve-section row">
                            <div class="col-md">
                                <select class="form-select form-select-md" name="supplier" id="">
                                    <option value="">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>

                                @error('supplier')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md">
                                <div class="actions">
                                    <button type="submit" class="btn btn-success btn-group ">Approve Again</button>
                                    <a href="#" class="btn-group btn btn-primary">Refund Amount</a>                                          
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <div>
                        <hr>
                        <h3>Supplier Info</h3>
                    </div>
                    <div class="supplier-info row">
                        <!--<div class="col-md"><h4></h4></div> -->
                        <div class="col-md"><a href="{{route('details-admin',['id'=>$order->supplier_id])}}" class="btn btn-primary supplier-name ">Supplier Name : {{$order->users->name}}</a></div>
                    </div>    

                @endif
            </div>
        </div>
    </div>
@endsection


