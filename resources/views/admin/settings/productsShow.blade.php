@extends('admin/layout/layout')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/productsShow.css')}}">
    <div class="content-margin">

        <div class="show-categories">
            <div class="table-upper-row"> 

                <div class="table-title">
                    <h4>Product List</h4>  
                </div>  
                
                <form action="{{route('search-product')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md search-part">
                            <div><h5><label for="" class="form-label search-label">Search By</label></h5></div>
                            <div>
                                <select class="form-select form-select-md search-field" name="option">
                                    <option value="name">Product Name</option>
                                    <option value="category">Category</option>
                                </select>
                            </div>
 
                        </div>
                        <div class="col-md">
                          <input type="text" class="form-control" name="search_field" id="" placeholder="kg">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-success search-btn">Search</button>
                        </div>
                        <div class="col-md">
                            <a href="{{route('show-products')}}" class="btn btn-success default-btn">Show Default</a>
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
                            <th scope="col">Unit</th>
                            <th scope="col">Category </th>
                            <th scope="col">Parent Category </th>
                            <th scope="col">Buying Price </th>
                            <th scope="col">Selling Price </th>
                            <th scope="col">Discount</th>
                            <th scope="col">Pre-Payment Amount </th>
                            <th scope="col">Minimum Order </th>
                            <th scope="col">Status </th>
                            <th scope="col">Adding Date </th>
                            <th scope="col">Expire Date </th>
                            <th scope="col">Tags </th>
                            <th scope="col">Linked Product </th>
                            <th scope="col">Action </th>
                            
                        </tr> 
                    </thead>
                    <tbody>

                        @if ($products->isEmpty())
                            <td colspan="16">
                                <h3 class="bg-danger">No Product found</h3>
                            </td>

                        @else
                            @foreach ($products as $product)
                                <tr class="">
                                    <td> 
                                        @if ($product->gallery_image)
                                            <img src="{{asset('storage/images/product/'.$product->gallery_image)}}" class="inner-photo">
                                        @else
                                            <span>No image found!</span>
                                        @endif
                                    </td>
                                    <td> {{$product->name}} </td>
                                    <td> {{$product->unit}} </td>
                                    <td> {{$product->category}} </td>
                                    <td> {{$product->parent_category}} </td> 
                                    <td> {{$product->buying_price}} </td>
                                    <td> {{$product->selling_price}} </td>
                                    <td> {{$product->discount}} </td>
                                    <td> {{$product->prepayment_amount}} </td>
                                    <td> {{$product->minimum_order}} </td>
                                    <td> {{$product->status}} </td>
                                    <td> {{$product->adding_date}} </td>
                                    <td> {{$product->expiring_date}} </td>
                                    <td> {{$product->tags}} </td>
                                    <td> {{$product->link_products}} </td>




                                    <td>
                                        <a href="{{route('product-edit',[$product->id])}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('product-delete',[$product->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr> 

                            
                                
                            @endforeach
                        @endif
                    </tbody>
                </table>
              
            </div>
            
        </div>
    </div>

@endsection