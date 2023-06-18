@extends('admin/layout/layout')

@section('content')
    
    <link rel="stylesheet" href="{{asset('css/admin/settings/supplierDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Supplier Profile</h4>
            </div>
            <div class="flex card-body"> 
                <div class="profile">
                    <div>
                        @if ($supplier->image)
                            <img src="{{asset('storage/images/supplier/'.$supplier->image)}}" class="photo">
                        @else
                            <span>No image found!</span>
                        @endif
                    </div>   

                    <div class="personal-details">
                        <ul>
                            <li>
                                <h6>Name</h6>
                                <h5>{{$supplier->name}}</h5>
                            </li>
                            <hr>

                            <li>
                                <h6>Phone No</h6>
                                <h5>{{$supplier->phone}}</h5>
                            </li>
                            <hr>

                            @if ($supplier->phone2)
                                <li>
                                    <h6>Another Phone No</h6>
                                    <h5>{{$supplier->phone2}}</h5>
                                </li>
                                <hr>                                
                            @endif

                            <li>
                                <h6>Email</h6>
                                <h5>{{$supplier->email}}</h5>
                            </li>
                            <hr>

                            <li>
                                <h6>NID</h6>
                                <h5>{{$supplier->nid}}</h5>
                            </li>
                            <hr>

                            
                            
                        </ul>
                    </div>

                </div>
    
                <div class="shop-details">

                    <ul>
                        <li>
                            <h6>Aria</h6>
                            <h5>{{$supplier->aria}}</h5>
                        </li>
                        <hr>

                        <li>
                            <h6>Address</h6>
                            <h5>{{$supplier->address}}</h5>
                        </li>
                        <hr>

                        <li>
                            <h6>Shop Location</h6>
                            <h5>{{$supplier->shop_location}}</h5>
                        </li>
                        <hr>
                    </ul>
                    
                </div>
            </div>
        </div>


    </div>
    
@endsection