<?php

namespace App\Http\Controllers;

use App\Models\Arias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AriaController extends Controller
{
    public function show(){
        $aria=DB::table('arias')
                ->where('aria_id','')
                ->first();

        $arias=DB::table('arias')->get();

        return view('admin/settings/ariaSettings',['aria'=>$aria,'arias'=>$arias]);
    }

    public function store(Request $request){
        $request->validate([
            'aria_name' => 'required|unique:arias'
        ]);

        $aria=DB::table('arias')
                ->insert([
                    'aria_name' => $request['aria_name'],
                    'parent_aria' => $request['parent_aria']
                ]);

        return redirect('aria-settings');

    }

    public function delete($aria_id){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->delete();

        return redirect('aria-settings');
    }

    public function edit($aria_id){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->first();

        $arias=DB::table('arias')
                ->get();

        return view('admin/settings/ariaUpdate',['aria'=>$aria,'arias'=>$arias]);
    }

    public function update($aria_id, Request $request){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->update([
                    'aria_name'=> $request['aria_name'],
                    'parent_aria' =>$request['parent_aria']
                ]);
        return redirect('aria-settings');

    }

    public function filter(Request $request){
        $arias=DB::table('arias')
                    ->select('*')
                    ->where('aria_name','like','%'.$request['search_field'].'%')
                    ->orWhere('parent_aria','like','%'.$request['search_field'].'%')
                    ->get();
        
        return view('admin/settings/ariaSettings',['arias'=>$arias]);
        
    }




}
