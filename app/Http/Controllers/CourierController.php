<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourierController extends Controller
{
    public function show(){
        $operators=DB::table('operators')->simplePaginate(15);
        return view('admin/settings/showOperators',['operators'=>$operators]);
    }

    public function add(){
        $arias=DB::table('arias')->get(); 
        return view('admin/settings/addOperator',['arias'=>$arias]);
    }

    public function store(Request $request){

        $request->validate([ 
            'name'=>'required',
            'aria'=>'required', 
            'address'=>'required',
            'phone'=>'required|unique:operators',
            'email'=>'nullable|email|unique:operators',
            'nid'=>'required|unique:operators',
            'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048' 
        ]);

        if($request->file('image')){
            $image_name=time().'operator'.$request['nid'].'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images',$image_name);
            $operator=DB::table('operators')
                        ->insert([ 
                            'name' =>$request['name'],
                            'aria'=>$request['aria'], 
                            'address'=>$request['address'],
                            'nid'=>$request['nid'],
                            'phone'=>$request['phone'],
                            'phone2'=>$request['phone2'],
                            'email'=>$request['email'],
                            'image'=>$image_name

                        ]);
        }

        else{
            $operator=DB::table('operators')
            ->insert([ 
                'name' =>$request['name'],
                'aria'=>$request['aria'], 
                'address'=>$request['address'],
                'nid'=>$request['nid'],
                'phone'=>$request['phone'],
                'phone2'=>$request['phone2'],
                'email'=>$request['email']
            ]);
        }
        return redirect('/show-operators'); 
    } 

    public function details($id){
        $operator=DB::table('operators')
                    ->where('id',$id)
                    ->first();
        return view('admin/settings/operatorDetails',['operator'=>$operator]);
    }

    public function delete($id){
        $aria=DB::table('operators')
                ->where('id',$id) 
                ->delete();

        return redirect('show-operators');
    }

    public function edit($id){
        $operator=DB::table('operators')
                ->where('id',$id)
                ->first();

        $arias=DB::table('arias')->get();

        return view('admin/settings/operatorUpdate',['arias'=>$arias,'operator'=>$operator]);
    }

    public function update($id, Request $request){
        
        $operator=DB::table('operators')
                    ->where('id',$id)
                    ->first();

        if($operator->phone!=$request['phone']){
            $request->validate([
                'phone'=>'required|unique:operators'
            ]);
        }
        if($operator->email!=$request['email']){
            $request->validate([
                'email'=>'nullable|unique:operators'
            ]);
        }
        if($operator->nid!=$request['nid']){
            $request->validate([
                'nid'=>'required|unique:operators'
            ]);
        }

        if($request->file('image')){
            $image_name=time().'operator_updated'.$request['nid'].'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/images',$image_name);
            $operator=DB::table('operators')
                        ->where('id',$id)
                        ->update([
                            'name' =>$request['name'],
                            'aria'=>$request['aria'], 
                            'address'=>$request['address'],
                            'nid'=>$request['nid'],
                            'phone'=>$request['phone'],
                            'phone2'=>$request['phone2'],
                            'email'=>$request['email'],
                            'image'=>$image_name
                        ]);
        }

        else{
            $operator=DB::table('operators')
                        ->where('id',$id)
                        ->update([
                            'name' =>$request['name'],
                            'aria'=>$request['aria'], 
                            'address'=>$request['address'],
                            'nid'=>$request['nid'],
                            'phone'=>$request['phone'],
                            'phone2'=>$request['phone2'],
                            'email'=>$request['email']
                        ]);
        }
        return redirect('/show-operators');

    } 

    public function search(Request $request){
        $operators=DB::table('operators')
                    ->select('*')
                    ->where('name','like','%'.$request['search'].'%')
                    ->orWhere('aria','like','%'.$request['search'].'%')
                    ->orWhere('phone','like','%'.$request['search'].'%')
                    ->orWhere('nid','like','%'.$request['search'].'%')
                    ->simplePaginate(15);
        
        return view('admin/settings/showOperators',['operators'=>$operators]);
    }


}
