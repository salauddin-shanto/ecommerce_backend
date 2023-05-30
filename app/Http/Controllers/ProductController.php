<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show(){
        $products=DB::table('products')->simplePaginate(15);
        $categories=DB::table('categories')->get();
        return view('admin/settings/productsShow',['products'=>$products,'categories'=>$categories]);
    } 
    
    public function add(){
        $products=DB::table('products')->get();  
        $units=DB::table('units')->get(); 
        $categories=DB::table('categories')->get(); 
        return view('admin/settings/productAdd',['products'=>$products,'units'=>$units,'categories'=>$categories]);
    }
 
 
    public function store(Request $request){
 
        $request->validate([ 
            'name'=>'required|max:200|unique:products',
            'photos.*'=>'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:3072',
            'gallery_image'=> 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:3072',
            'buying_price'=>'required|numeric|min:0|max:9999999999.99',
            'selling_price'=>'required|numeric|min:0|max:9999999999.99',
            'discount'=>'nullable|numeric|min:0|max:9999999999.99',
            'prepayment_amount'=>'nullable|numeric|min:0|max:9999999999.99',
            'minimum_order'=>'nullable|numeric|min:0|max:9999999999.99',
            'adding_date'=>'required|date',
            'expiring_date'=>'required|date',
            'tags'=>'required',
            'link_products'=>'nullable',  
            'product_description'=>'nullable|max:2000',
            'admin_description'=>'nullable|max:2000',
        ]);

       /*  for multiple photos */
        $photosArray = [];
        foreach($request->file('photos') as $photo){
            $photo_name=time().'product_photo.'.$photo->getClientOriginalExtension();
            $photo->storeAs('public/images/product',$photo_name);
            $photosArray[]=$photo_name;
        }
        $photos_string=implode(',',$photosArray);  

        /* for gallery image */
        if($request->file('gallery_image')){
            $gallery_image_name=time().'gallery_image.'.$request->file('gallery_image')->getClientOriginalExtension();
            $request->file('gallery_image')->storeAs('public/images/product',$gallery_image_name);
        }

        else{
            $gallery_image_name='';
        }

        $product=DB::table('products')
                    ->insert([ 
                        'name' =>$request->input('name'),
                        'unit' =>$request->input('unit'),
                        'photos' =>$photos_string,
                        'gallery_image' =>$gallery_image_name,
                        'category' =>$request->input('category'),
                        'parent_category' =>$request->input('parent_category'),
                        'buying_price' =>$request->input('buying_price'),
                        'selling_price' =>$request->input('selling_price'),
                        'discount' =>$request->input('discount'),
                        'prepayment_amount' =>$request->input('prepayment_amount'),
                        'minimum_order' =>$request->input('minimum_order'),
                        'status' =>$request->input('status'),
                        'adding_date' =>$request->input('adding_date'),
                        'expiring_date' =>$request->input('expiring_date'),
                        'tags' =>$request->input('tags'),
                        'link_products' =>$request->input('link_products'),
                        'product_description' =>$request->input('product_description'),
                        'admin_description' =>$request->input('admin_description')
                    ]);
    
        return redirect('show-products'); 
    } 

    public function delete($id){
        $aria=DB::table('products')
                ->where('id',$id) 
                ->delete();

        return redirect('show-products');
    }

    public function search(Request $request){
        $categories=DB::table('categories')->get();
        $products=DB::table('products')
                    ->select('*')
                    ->where($request->input('option'),'like','%'.$request->input('search_field').'%')
                    ->simplePaginate(15);
        
        return view('admin/settings/productsShow',['products'=>$products,'categories'=>$categories]);
    } 

    public function edit($id){
        $product=DB::table('products')
                ->where('id',$id)
                ->first();

        $products=DB::table('products')->get(); 
        $units=DB::table('units')->get(); 
        $categories=DB::table('categories')->get(); 

        return view('admin/settings/productUpdate',['product'=>$product,'products'=>$products,'units'=>$units,'categories'=>$categories]);
    }

    public function update($id, Request $request){
        $product=DB::table('products')
                    ->where('id',$id) 
                    ->first();

        if($product->name!=$request->input('name')){
            $request->validate([
                'name'=>'required|unique:products'
            ]);
        }

        else{
            $request->validate([ 
                'photos.*'=>'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:3072',
                'gallery_image'=> 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:3072',
                'buying_price'=>'required|numeric|min:0|max:9999999999.99',
                'selling_price'=>'required|numeric|min:0|max:9999999999.99',
                'discount'=>'nullable|numeric|min:0|max:9999999999.99',
                'prepayment_amount'=>'nullable|numeric|min:0|max:9999999999.99',
                'minimum_order'=>'nullable|numeric|min:0|max:9999999999.99',
                'adding_date'=>'required|date',
                'expiring_date'=>'required|date',
                'tags'=>'required',
                'link_products'=>'nullable',  
                'product_description'=>'nullable|max:2000',
                'admin_description'=>'nullable|max:2000',
            ]);
        }

        /*  for multiple photos */ 
        if($request->file('photos')){
            $photosArray = [];
            foreach($request->file('photos') as $photo){
                $photo_name=time().'product_photo.'.$photo->getClientOriginalExtension();
                $photo->storeAs('public/images/product',$photo_name);
                $photosArray[]=$photo_name;
            }
            $photos_string=implode(',',$photosArray); 
        }
        else{
            $photos_string=$product->photos;
        }
        /* for gallery image */
        if($request->file('gallery_image')){
            $gallery_image_name=time().'gallery_image.'.$request->file('gallery_image')->getClientOriginalExtension();
            $request->file('gallery_image')->storeAs('public/images/product',$gallery_image_name);
        }

        else{
            $gallery_image_name=$product->gallery_image;
        }


        $product=DB::table('products')
                    ->where('id',$id)
                    ->update([
                        'name' =>$request->input('name'),
                        'unit' =>$request->input('unit'),
                        'photos' =>$photos_string,
                        'gallery_image' =>$gallery_image_name,
                        'category' =>$request->input('category'),
                        'parent_category' =>$request->input('parent_category'),
                        'buying_price' =>$request->input('buying_price'),
                        'selling_price' =>$request->input('selling_price'),
                        'discount' =>$request->input('discount'),
                        'prepayment_amount' =>$request->input('prepayment_amount'),
                        'minimum_order' =>$request->input('minimum_order'),
                        'status' =>$request->input('status'),
                        'adding_date' =>$request->input('adding_date'),
                        'expiring_date' =>$request->input('expiring_date'),
                        'tags' =>$request->input('tags'),
                        'link_products' =>$request->input('link_products'),
                        'product_description' =>$request->input('product_description'),
                        'admin_description' =>$request->input('admin_description')
                    ]);

        return redirect('show-products');

    } 


}
