<?php

namespace App\Http\Controllers;
use App\Models\Units;
 
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UnitController extends Controller
{
    public function show(){
        $units=DB::table('units')->simplePaginate(15);        
        return view('admin/settings/unitSettings',['units'=>$units]);
    } 

    public function store(Request $request){
        $request->validate([
            'unit_name' => 'required|unique:units'
        ]); 


        $unit=DB::table('units')
                ->insert(['unit_name'=>$request['unit_name'],
                        'parent_unit'=>$request['parent_unit'],
                        'description'=>$request['description'] ]);

        return redirect('/unit-settings');
    }

    public function delete($unit_id){
        $unit=DB::table('units')
                ->where('unit_id',$unit_id)
                ->delete();
                return redirect('/unit-settings');
    }

    public function edit($unit_id){
        $unit=DB::table('units')
                ->where('unit_id',$unit_id)->first();

        $units=DB::table('units')->get();

        if(is_null($unit)){
            return redirect('/unit-settings');
        }
        else{
            return view('admin/settings/unitUpdate' ,['unit'=>$unit ,'units'=>$units] );
        }
        
    }

    public function update(Request $request, $unit_id){
        $affected = DB::table('units')
              ->where('unit_id', $unit_id)
              ->update(['unit_name' => $request['unit_name'], 'parent_unit'=>$request['parent_unit'],'description'=>$request['description'] ]);

        return redirect('/unit-settings');

    }

    public function filter(Request $request){
        $units=DB::table('units')
                ->select('*')
                ->where('unit_name','like','%'.$request['search_field'].'%')
                ->orWhere('parent_unit','like','%'.$request['search_field'].'%')
                ->get();

        return view('admin/settings/unitSettings',['units'=>$units]);
    }


}
