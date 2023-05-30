@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/categoryAdd.css')}}">
    <div class="content-margin card shadow-lg mb-5 bg-white rounded">
        <div class="card-header bg-dark">
            <div class="table-title"> 
                <h4>Add Category</h4> 
            </div> 
               
        </div>  

        <div class="add-category card-body">

            <form action="{{route('add-category')}}" method="POST" class="add-category-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label"> Category Name</label>
                      <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}" id="category_name">
                      <span class="text-danger">
                         @error('category_name')
                             {{$message}}
                         @enderror
                      </span>     
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Parent Category</label>
                        <select class="form-select form-select-md" name="parent_category" id="parent_category">
                            <option value="{{old('parent_category')}}">{{old('parent_category') ? old("parent_category"):'Select One'}}</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="description" value="{{old('description')}}" id="" rows="2"></textarea>
                        <span class="text-danger">
                            @error('description')
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