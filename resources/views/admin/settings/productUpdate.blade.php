@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/productAdd.css')}}">
    <div class="content-margin card shadow-lg mb-5 bg-white rounded">
        <div class="card-header bg-dark">
            <div class="table-title"> 
                <h4>Update Product</h4>  
            </div>  
               
        </div>  

        <div class="add-product card-body">

            <form action="{{route('product-update',['id'=>$product->id])}}" method="POST" class="add-product-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label">Product Name</label>
                      <input type="text" class="form-control" name="name" value="{{$product->name}}" id="name">
                      <span class="text-danger">
                         @error('name')
                             {{$message}}  
                         @enderror
                      </span>     
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Unit</label>
                        <select class="form-select form-select-md" name="unit" id="unit">
                            <option value="{{$product->unit}}">{{$product->unit}}</option>
                            @foreach ($units as $unit)
                                <option value="{{$unit->unit_name}}">{{$unit->unit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Upload Photos</label>
                        <input type="file" class="form-control" name="photos[]" value="{{$product->photos}}" multiple>
                        <span class="text-danger">
                           @error('photos')
                               {{$message}}
                           @enderror 
                        </span>     
                    </div>
 
                    <div class="col-md ">
                        <label for="" class="form-label">Gallery Image</label>
                        <input type="file" class="form-control" name="gallery_image" value="{{$product->gallery_image}}">
                        <span class="text-danger">
                           @error('gallery_image')
                               {{$message}}
                           @enderror 
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <label for="" class="form-label">Category</label>
                        <select class="form-select form-select-md" name="category">
                            <option value="{{$product->category}}">{{$product->category}}</option>
                            @foreach ($categories as $category)
                                @if ($category->category_name==$product->category)
                                    @continue
                                @else
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Parent Category</label>
                        <select class="form-select form-select-md" name="parent_category">
                            <option value="{{$product->parent_category}}">{{$product->parent_category}}</option>
                            @foreach ($categories as $category)
                                @if ($category->category_name==$product->parent_category)
                                    @continue
                                @else
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Buying Price</label>
                        <input type="number" step="0.01" class="form-control" name="buying_price" value="{{$product->buying_price}}">
                        <span class="text-danger">
                            @error('buying_price')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Selling Price</label>
                        <input type="number" step="0.01" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                        <span class="text-danger">
                            @error('selling_price')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Discount</label>
                        <input type="number" step="0.01" class="form-control" name="discount" value="{{$product->discount}}" id="discount">
                        <span class="text-danger">
                            @error('discount')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Pre-Payment Amount</label>
                        <input type="number" step="0.01" class="form-control" name="prepayment_amount" value="{{$product->prepayment_amount}}" id="prepayment_amount">
                        <span class="text-danger">
                            @error('prepayment_amount')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Minimum Order</label>
                        <input type="number" step="0.01" class="form-control" name="minimum_order" value="{{$product->minimum_order}}" id="minimum_order">
                        <span class="text-danger">
                            @error('minimum_order')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Status</label>
                        <select class="form-select form-select-md" name="status" id="status">
                            @if ($product->status=='Available')
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                               
                            @else
                                <option value="Not Available">Not Available</option>
                                <option value="Available">Available</option>
                            @endif
                        
                        </select>    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Adding Date</label>
                        <input type="date" class="form-control" name="adding_date" value="{{$product->adding_date}}" id="adding_date">
                        <span class="text-danger">
                            @error('adding_date')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md ">
                        <label for="" class="form-label">Expire Date</label>
                        <input type="date" class="form-control" name="expiring_date" value="{{$product->expiring_date}}" id="expiring_date">
                        <span class="text-danger">
                            @error('expiring_date')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>
                </div>

                <div class="row">
                    <div class="col-md ">
                        <label for="" class="form-label">Tags</label>
                        <input type="text" class="form-control" name="tags" value="{{$product->tags}}" id="tags">
                        <span class="text-danger">
                            @error('tags')
                                {{$message}}
                            @enderror
                        </span>     
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Link Similar Products</label>
                        <select class="form-select form-select-md" name="link_products" id="link_products">
                            <option value="{{$product->link_products}}">{{$product->link_products}}</option>
                            @foreach ($products as $product)
                                @if ($product->name==$product->link_products)
                                    @continue
                                @else
                                    <option value="{{$product->name}}">{{$product->name}}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md">
                        <label for="" class="form-label">Product Description</label>
                        <textarea class="form-control" name="product_description" rows="3">{{$product->product_description}}</textarea>
                        <span class="text-danger">
                            @error('product_description')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                
                    <div class="col-md">
                        <label for="" class="form-label">Admin Description</label>
                        <textarea class="form-control" name="admin_description" rows="3">{{$product->admin_description}}</textarea>
                        <span class="text-danger">
                            @error('admin_description')
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