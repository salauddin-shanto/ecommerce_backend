<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB; 

class SupplierController extends Controller 
{
    public function show(){
        $suppliers=DB::table('suppliers')
                    ->get();
        return view('admin/settings/supplierSettings',['suppliers'=>$suppliers]);
    }

    public function create(){
        return view('admin/settings/addSupplier');
    }

    public function store(Request $request){

        $request->validate([ 
            'name'=>'required',
            'aria'=>'required', 
            'address'=>'required',
            'shop_location'=>'required',
            'phone'=>'required|unique:suppliers',
            'email'=>'nullable|email|unique:suppliers',
            'nid'=>'required|unique:suppliers',
            'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048' 
        ]);

        if($request->file('image')){
            $image_name=time().'supplier'.$request['nid'].'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images',$image_name);
            $supplier=DB::table('suppliers')
            ->insert([ 
                'name' =>$request['name'],
                'aria'=>$request['aria'], 
                'address'=>$request['address'],
                'shop_location'=>$request['shop_location'],
                'phone'=>$request['phone'],
                'phone2'=>$request['phone2'],
                'email'=>$request['email'],
                'nid'=>$request['nid'],
                'image'=>$image_name

            ]);
        }

        else{
            $supplier=DB::table('suppliers')
            ->insert([ 
                'name' =>$request['name'],
                'aria'=>$request['aria'], 
                'address'=>$request['address'],
                'shop_location'=>$request['shop_location'],
                'phone'=>$request['phone'],
                'phone2'=>$request['phone2'],
                'email'=>$request['email'],
                'nid'=>$request['nid'],

            ]);
        }
        return redirect('/supplier-settings'); 
    }
 
    public function details($id){
        $supplier=DB::table('suppliers')
                    ->where('id',$id)
                    ->first();
        return view('admin/settings/supplierDetails',['supplier'=>$supplier]);
    }
}
