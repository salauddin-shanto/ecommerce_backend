@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/client/showClients.css') }}">
    <div class="content-margin">
        <div class="form-upper-row"> 

            <div class="table-title">
                <h4>Customers List</h4>  
            </div>  
            
            <form action="{{route('search-client')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                      <input type="text" class="form-control" name="search_field" id="">
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-success search-btn">Search</button>
                    </div>
                    <div class="col-md">
                        <a href="{{route('all-clients')}}" class="btn btn-success default-btn">Show Default</a>
                    </div> 
                </div> 
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">District </th>
                        <th scope="col">Upazila </th>
                        <th scope="col">Village </th>
                        <th scope="col">Location </th>
                        <th scope="col">Total Order</th>
                        <th scope="col">Total Spend</th>
                        <th scope="col">AOV (Average Order Value)</th>
                        <th scope="col">Last Activity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td scope="col">{{$client->name}}</td>
                            <td scope="col">{{$client->phone}}</td>
                            <td scope="col">{{$client->email}}</td>
                            <td scope="col">{{$client->dob}}</td>
                            <td scope="col">{{$client->city}}</td>
                            <td scope="col">{{$client->area}} </td>
                            <td scope="col">{{$client->zone}} </td>
                            <td scope="col">{{$client->location}} </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col">
                                <a href="{{route('suspend-client',['id'=>$client->id])}}" class="btn btn-danger">Suspend</a>
                            </td> 
                        </tr>
 
                        @endforeach

                    </tbody> 
{{--                 <tbody id="searchResults">
                    @foreach ($users as $user)
                        <tr id="userRow{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>   
                                @foreach ($user->roles as $role)
                                    <div class="roles">{{$role->name}}</div>                                  
                                @endforeach
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{route('details-admin',['id'=>$user->id])}}" class="btn btn-success">Details</a>
                                <a href="{{route('edit-admin',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete-admin',['id'=>$user->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
@endsection
