<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show(){
        $categories=DB::table('categories')->simplePaginate(15);
        return view('admin/settings/categoriesShow',['categories'=>$categories]);
    }

    public function add(){
        $categories=DB::table('categories')->get(); 
        return view('admin/settings/categoryAdd',['categories'=>$categories]);
    }
 
    public function store(Request $request){
 
        $request->validate([ 
            'category_name'=>'required|max:200|unique:categories',
            'description'=>'nullable|max:2000',
            'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:3072' 
        ]);

        if($request->file('image')){ 
            $image_name=time().'category.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images/category',$image_name);
            $category=DB::table('categories')
                        ->insert([ 
                            'category_name' =>$request['category_name'],
                            'parent_category'=>$request['parent_category'], 
                            'description'=>$request['description'],
                            'image'=>$image_name

                        ]);
        }

        else{
            $category=DB::table('categories')
                        ->insert([ 
                            'category_name' =>$request['category_name'],
                            'parent_category'=>$request['parent_category'], 
                            'description'=>$request['description']
                        ]);
        }
        return redirect('show-categories'); 
    } 

    public function delete($id){
        $aria=DB::table('categories')
                ->where('id',$id) 
                ->delete();

        return redirect('show-categories');
    }

    public function edit($id){
        $category=DB::table('categories')
                ->where('id',$id)
                ->first();

        $categories=DB::table('categories')->get();

        return view('admin/settings/categoryUpdate',['category'=>$category,'categories'=>$categories]);
    }

    public function update($id, Request $request){
        
        $category=DB::table('categories')
                    ->where('id',$id) 
                    ->first();

        if($category->category_name!=$request['category_name']){
            $request->validate([
                'category_name'=>'required|unique:categories'
            ]);
        }

        if($request->file('image')){
            $image_name=time().'category_updated.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images/category',$image_name);
            $category=DB::table('categories')
                        ->where('id',$id)
                        ->update([
                            'category_name' =>$request['category_name'],
                            'parent_category'=>$request['parent_category'], 
                            'description'=>$request['description'],
                            'image'=>$image_name
                        ]);
        }

        else{
            $category=DB::table('categories')
                        ->where('id',$id)
                        ->update([
                            'category_name' =>$request['category_name'],
                            'parent_category'=>$request['parent_category'], 
                            'description'=>$request['description']
                        ]);
        }
        return redirect('/show-categories');

    } 

    public function search(Request $request){
        $categories=DB::table('categories')
                    ->select('*')
                    ->where('category_name','like','%'.$request['search'].'%')
                    ->orWhere('parent_category','like','%'.$request['search'].'%')
                    ->simplePaginate(15);
        
        return view('admin/settings/categoriesShow',['categories'=>$categories]);
    }
}
