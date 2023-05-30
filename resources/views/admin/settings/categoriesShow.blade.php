@extends('admin/layout/layout')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/categoriesShow.css')}}">
    <div class="content-margin">

        <div class="show-categories">
            <div class="table-upper-row"> 

                <div class="table-title">
                    <h4>Categories List</h4>  
                </div> 
                
                <form action="{{route('search-category')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                          <input type="text" class="form-control" name="search" id="" placeholder="kg">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success search-btn">Search</button>
                        </div>
                        <div class="col-md">
                            <a href="{{route('show-categories')}}" class="btn btn-success default-btn">Show Default</a>
                        </div> 

                    </div>
                </form>

            </div>

            <div class="table-responsive">
                <table class="table table-primary table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Parent Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                            
                        </tr> 
                    </thead>
                    <tbody>
                        
                        @foreach ($categories as $category)
                            <tr class="">
                                <td> 
                                    @if ($category->image)
                                        <img src="{{asset('storage/images/category/'.$category->image)}}" class="inner-photo">
                                    @else
                                        <span>No image found!</span>
                                    @endif
                                </td>
                                <td> {{$category->category_name}} </td>
                                <td> {{$category->parent_category}} </td>
                                <td> {{$category->description}} </td>
                                <td>
                                    <a href="{{route('category-edit',[$category->id])}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('category-delete',[$category->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr> 
 
                        
                             
                        @endforeach
                        
                    </tbody>
                </table>
              
            </div>
            
        </div>

        <div>
            {{$categories->links()}}
        </div>
        
    </div>

@endsection