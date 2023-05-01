@extends('admin/master')

@section('content')
    <link rel="stylesheet" href="{{asset('css/addSupplier.css')}}">
    <div class="content-margin card shadow-lg mb-5 bg-white rounded">
        <div class="card-header bg-dark">
            <div class="table-title"> 
                <h4>Add Supplier</h4> 
            </div> 
              
        </div> 

        <div class="add-supplier card-body">
           

            <form action="{{route('add-supplier')}}" method="POST" class="add-supplier-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label">Supplier Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                      <span class="text-danger">
                         @error('name')
                             {{$message}}
                         @enderror
                      </span>     
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Aria</label>
                        <input type="text" class="form-control" name="aria" value="{{old('aria')}}" id="aria">
                        <span class="text-danger">
                           @error('aria')
                               {{$message}}
                           @enderror
                        </span> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address">
                        <span class="text-danger">
                           @error('address')
                               {{$message}}
                           @enderror
                        </span>     
                      </div>

                      <div class="col-md ">
                        <label for="" class="form-label">Shop location</label>
                        <input type="text" class="form-control" name="shop_location" value="{{old('shop_location')}}" id="shop_location">
                        <span class="text-danger">
                           @error('shop_location')
                               {{$message}}
                           @enderror
                        </span>     
                      </div>
                </div>

                <div class="row">

                    <div class="col-md ">
                      <label for="" class="form-label">Phone No.</label>
                      <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" id="phone" placeholder="01xxxxxxxxx">    
                      <span class="text-danger">
                        @error('phone')
                            {{$message}}
                        @enderror
                     </span>
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Another Phone No.</label>
                        <input type="tel" class="form-control" name="phone2" value="{{old('phone2')}}" id="phone2" placeholder="01xxxxxxxxx">    
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md ">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="rashitech@gmail.com">
                        <span class="text-danger">
                           @error('email')
                               {{$message}}
                           @enderror
                        </span>     
                      </div>

                    <div class="col-md ">
                        <label for="" class="form-label">NID</label>
                        <input type="text" class="form-control" name="nid" value="{{old('nid')}}" id="nid">
                        <span class="text-danger">
                           @error('nid')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}" id="image">
                        <span class="text-danger">
                           @error('image')
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



@endsection