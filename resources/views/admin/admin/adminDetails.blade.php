@extends('admin/layout/layout')

@section('content')
    
    <link rel="stylesheet" href="{{asset('css/admin/admin/adminDetails.css')}}">
    <div class="content-margin">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Admin Profile</h4>
            </div>

            <div class="flex card-body"> 
                <div class="profile-pic">
                    <img src="{{asset('storage/images/users/'.$user->image)}}" class="photo">
                </div>   

                <div class="row user-details">
                    <div class="col-md">
                        <div class="info">
                            <h6>Name</h6>
                            <h5>{{$user->name}}</h5>
                        </div>

                        <div class="info">
                            <h6>User Name</h6>
                            <h5>{{$user->user_name}}</h5>
                        </div>

                        <div class="info">
                            <h6>Phone No</h6>
                            <h5>{{$user->phone}}</h5>
                        </div>

                        @if ($user->phone2)
                            <div class="info">
                                <h6>Another Phone No</h6>
                                <h5>{{$user->phone2}}</h5>
                            </div>      
                        @endif

                        <div class="info">
                            <h6>Email</h6>
                            <h5>{{$user->email}}</h5>
                        </div>


                        <div class="info">
                            <h6>NID</h6>
                            <h5>{{$user->nid}}</h5>
                        </div>
                    </div>


                    <div class="col-md">
                        <div class="roles-section">
                            <div>
                                <h3><a href="{{route('show-roles')}}" class="roles-header">Roles</a></h3>
                            </div>
                            @foreach ($user->roles as $role)
                                <div class="roles">{{$role->name}}</div>  
                            @endforeach
                        </div>

                        <div class="permissions-section">
                            <h3>
                                Permissions
                            </h3>
                            @foreach ($user->roles as $role)
                                @foreach ($role->permissions as $permission)
                                    <div class="permissions">{{$permission->name}}</div> 
                                @endforeach
                                 
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="edit">
                    <a href="{{route('edit-admin',['id'=>$user->id])}}"><h3 class="edit-click">Click Here to Edit the User!</h3></a></h3>
                </div>
            </div>
        </div>
    </div>
@endsection