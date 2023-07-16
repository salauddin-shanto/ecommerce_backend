@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/admin/addAdmin.css')}}">
    <div class="content-margin card shadow-lg mb-5 bg-white rounded">
        <div class="card-header bg-dark">
            <div class="table-title"> 
                <h4>Update Admin</h4> 
            </div> 
               
        </div>  

        <div class="add-supplier card-body">
        
            <form action="{{route('update-admin',['id'=>$user->id])}}" method="POST" class="add-supplier-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name">
                        <span class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="user_name" value="{{$user->user_name}}" id="user_name">
                        <span class="text-danger">
                           @error('user_name')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>

                </div>

                <div class="row">

                    <div class="col-md ">
                      <label for="" class="form-label">Phone No.</label>
                      <input type="tel" class="form-control" name="phone" value="{{$user->phone}}" id="phone" placeholder="01xxxxxxxxx">    
                      <span class="text-danger">
                        @error('phone')
                            {{$message}}
                        @enderror
                     </span>
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Another Phone No.</label>
                        <input type="tel" class="form-control" name="phone2" value="{{$user->phone2}}" id="phone2" placeholder="01xxxxxxxxx">    
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md ">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" placeholder="rashitech@gmail.com">
                        <span class="text-danger">
                           @error('email')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">NID</label>
                        <input type="text" class="form-control" name="nid" value="{{$user->nid}}" id="nid">
                        <span class="text-danger">
                           @error('nid')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" placeholder="********">
                        <span class="text-danger">
                           @error('password')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" id="confirm_password" placeholder="********">
                        <span class="text-danger">
                           @error('confirm_password')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>
                </div>

                
                <div class="row">



                    <div class="col-md"> 
                        <label for="" class="form-label">Role</label>
                        <select class="form-select form-select-md" name="roles[]" id="roles" multiple>
                            @foreach ($allRoles as $role)
                                <option value="{{$role->name}}" {{$user->hasRole($role->name) ? 'selected': ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" name="image" value="{{$user->image}}" id="image">
                        <span class="text-danger">
                           @error('image')
                               {{$message}}
                           @enderror 
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label">Area</label>
                      <input type="text" class="form-control" name="aria" value="{{$user->aria}}" id="aria">
                      <span class="text-danger">
                         @error('aria')
                             {{$message}}
                         @enderror
                      </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$user->address}}" id="address">
                        <span class="text-danger">
                           @error('address')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>

                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Shop Location</label>
                        <input type="text" class="form-control" name="shop_location" value="{{$user->shop_location}}" id="shop_location">
                        <span class="text-danger">
                           @error('shop_location')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
                    
               </div>
 
            </form>
        </div>
    </div>
    

    <script>
        $(document).ready(function() {
            $('#roles').select2();
        });
    </script>
        

@endsection