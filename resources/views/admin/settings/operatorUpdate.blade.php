@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/addOperator.css')}}">
    <div class="content-margin card shadow-lg mb-5 bg-white rounded">
        <div class="card-header bg-dark">
            <div class="table-title"> 
                <h4>Update Operator</h4> 
            </div> 
               
        </div>   

        <div class="add-supplier card-body">
           

            <form action="{{route('operator-update',['id'=>$operator->id])}}" method="POST" class="add-supplier-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label">Operator Name</label>
                      <input type="text" class="form-control" name="name" value="{{$operator->name}}" id="name">
                      <span class="text-danger">
                         @error('name')
                             {{$message}}
                         @enderror
                      </span>      
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Aria</label>

                        <select class="form-select form-select-md" name="aria" id="aria">
                            <option value="{{$operator->aria}}">{{$operator->aria }}</option>
                            @foreach ($arias as $aria)
                                <option value="{{$aria->aria_name}}">{{$aria->aria_name}}</option>
                            @endforeach
                        </select>
                        
                        {{-- <input type="text" class="form-control" name="aria" value="{{old('aria')}}" id="aria">
                        <span class="text-danger">
                           @error('aria')
                               {{$message}}
                           @enderror
                        </span>  --}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$operator->address}}" id="address">
                        <span class="text-danger">
                           @error('address')
                               {{$message}}
                           @enderror
                        </span>     
                      </div>

                      <div class="col-md ">
                        <label for="" class="form-label">NID</label>
                        <input type="text" class="form-control" name="nid" value="{{$operator->nid}}" id="nid">
                        <span class="text-danger">
                           @error('nid')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>


                </div>

                <div class="row">

                    <div class="col-md ">
                      <label for="" class="form-label">Phone No.</label>
                      <input type="tel" class="form-control" name="phone" value="{{$operator->phone}}" id="phone" placeholder="01xxxxxxxxx">    
                      <span class="text-danger">
                        @error('phone')
                            {{$message}}
                        @enderror
                     </span>
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Another Phone No.</label>
                        <input type="tel" class="form-control" name="phone2" value="{{$operator->phone2}}" id="phone2" placeholder="01xxxxxxxxx">    
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md ">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$operator->email}}" id="email" placeholder="rashitech@gmail.com">
                        <span class="text-danger">
                           @error('email')
                               {{$message}}
                           @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" name="image" value="{{$operator->image}}" id="image">
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