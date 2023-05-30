<?php

namespace App\Http\Controllers;

use App\Models\Arias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AriaController extends Controller
{
    public function addArea(){
        $arias=DB::table('arias')
                ->select('aria_name')
                ->get();
        return view('admin/settings/addArea',['arias'=>$arias]);
    }

    public function storeArea(Request $request){
        $request->validate([
            'aria_name' => 'required|unique:arias'
        ]);
        $now=Carbon::now();

        $aria=DB::table('arias')
                ->insert([
                    'aria_name' => $request['aria_name'],
                    'parent_aria' => $request['parent_aria'],
                    'created_at' =>$now,
                    'updated_at' =>$now
                ]);

        return redirect('show-areas');
    }

    public function showAreas(){
        $arias=DB::table('arias')
        ->orderBy('created_at','desc')
        ->get();
        return view('admin/settings/showAreas',['arias'=>$arias]);
    }

    public function delete($aria_id){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->delete();

        return redirect('show-areas');
    } 

    public function edit($aria_id){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->first();

        return view('admin/settings/areaUpdate',['aria'=>$aria]);
    }

    public function update($aria_id, Request $request){
        $aria=DB::table('arias')
                ->where('aria_id',$aria_id)
                ->update([
                    'aria_name'=> $request['aria_name'],
                    'parent_aria' =>$request['parent_aria']
                ]);
        return redirect('show-areas');

    }

    public function filter(Request $request){
        $arias=DB::table('arias')
                    ->select('*')
                    ->where('aria_name','like','%'.$request['search_field'].'%')
                    ->orWhere('parent_aria','like','%'.$request['search_field'].'%')
                    ->get();
        
        return view('admin/settings/showAreas',['arias'=>$arias]);
        
    }




}
