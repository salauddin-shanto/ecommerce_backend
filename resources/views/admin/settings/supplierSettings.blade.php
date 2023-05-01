@extends('admin/master')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/supplierSettings.css')}}">
    <div class="content-margin">

        <div class="show-suppliers">
            <div class="table-upper-row">

                <div class="table-title">
                    <h4>Suppliers List</h4>  
                </div>
                
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                          <input type="text" class="form-control" name="search_field" id="" placeholder="kg">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success search-btn">Search</button>
                        </div>
                        <div class="col-md">
                            <a href="" class="btn btn-success default-btn">Make Default</a>
                        </div>

                        <div class="col-md">
                            <a href="{{route('add-supplier')}}" class="btn btn-success default-btn">ADD Supplier</a>
                        </div>

                    </div>
                </form>

            </div>

            <div class="table-responsive">
                <table class="table table-primary table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">Aria</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($suppliers as $supplier)
                            <tr class="">
                                <td> 
                                    @if ($supplier->image)
                                        <img src="{{asset('storage/images/'.$supplier->image)}}" class="inner-photo">
                                    @else
                                        <span>No image found!</span>
                                    @endif
                                </td>
                                <td> {{$supplier->name}} </td>
                                <td> {{$supplier->aria}} </td>
                                <td> {{$supplier->phone}} </td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                    <a href="{{route('supplier-settings.details',[$supplier->id])}}" class="btn btn-success">Details</a>
                                </td>
                            </tr> 
 
                        
                            
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        
    </div>

@endsection