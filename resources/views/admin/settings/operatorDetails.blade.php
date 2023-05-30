@extends('admin/layout/layout')

@section('content')
    
    <link rel="stylesheet" href="{{asset('css/admin/settings/operatorDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Operator Profile</h4>
            </div>

            <div class="picture">
                @if ($operator->image)
                    <img src="{{asset('storage/images/'.$operator->image)}}" class="photo">
                @else
                    <span>No image found!</span>
                @endif
            </div>   

            <div class="flex card-body"> 
                <div class="profile">


                    <div class="personal-details">
                        <ul>
                            <li>
                                <h6>Name</h6>
                                <h5>{{$operator->name}}</h5>
                            </li>
                            <hr>

                            <li>
                                <h6>Phone No</h6>
                                <h5>{{$operator->phone}}</h5>
                            </li>
                            <hr>

                            @if ($operator->phone2)
                                <li>
                                    <h6>Another Phone No</h6>
                                    <h5>{{$operator->phone2}}</h5>
                                </li>
                                <hr>                                
                            @endif

                            <li>
                                <h6>Email</h6>
                                <h5>{{$operator->email}}</h5>
                            </li>
                        </ul>
                    </div>

                </div>
    
                <div class="shop-details">

                    <ul>
                        <li>
                            <h6>NID</h6>
                            <h5>{{$operator->nid}}</h5>
                        </li>
                        <hr>

                        <li>
                            <h6>Aria</h6>
                            <h5>{{$operator->aria}}</h5>
                        </li>
                        <hr>

                        <li>
                            <h6>Address</h6>
                            <h5>{{$operator->address}}</h5>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>


    </div>
    
@endsection