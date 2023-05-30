@extends('admin/layout/layout')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/showOperators.css')}}">
    <div class="content-margin">

        <div class="show-operators">
            <div class="table-upper-row">

                <div class="table-title">
                    <h4>Operator List</h4>  
                </div> 
                
                <form action="{{route('search-operator')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                          <input type="text" class="form-control" name="search" id="" placeholder="kg">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success search-btn">Search</button>
                        </div>
                        <div class="col-md">
                            <a href="{{route('show-operators')}}" class="btn btn-success default-btn">Make Default</a>
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
                        
                        @foreach ($operators as $operator)
                            <tr class="">
                                <td> 
                                    @if ($operator->image)
                                        <img src="{{asset('storage/images/'.$operator->image)}}" class="inner-photo">
                                    @else
                                        <span>No image found!</span>
                                    @endif
                                </td>
                                <td> {{$operator->name}} </td>
                                <td> {{$operator->aria}} </td>
                                <td> {{$operator->phone}} </td>
                                <td>
                                    <a href="{{route('operator-edit',[$operator->id])}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('operator-delete',[$operator->id])}}" class="btn btn-danger">Delete</a>
                                    <a href="{{route('operator-details',[$operator->id])}}" class="btn btn-success">Details</a>
                                </td>
                            </tr> 
 
                        
                            
                        @endforeach
                        
                    </tbody>
                </table>
              
            </div>
            
        </div>

        <div>
            {{$operators->links()}}
        </div>
        
    </div>

@endsection