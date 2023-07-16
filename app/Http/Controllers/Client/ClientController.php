<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ClientController extends Controller
{
    public function show(){
        $clients=Client::all();
        return view('admin/client/showClients',['clients'=>$clients]);
    }




    public function search(Request $request){
        $clients=Client::where('name','like','%'.$request['search_field'].'%')
                    ->orWhere('phone','like','%'.$request['search_field'].'%')
                    ->orWhere('email','like','%'.$request['search_field'].'%')
                    ->orWhere('city','like','%'.$request['search_field'].'%')
                    ->orWhere('zone','like','%'.$request['search_field'].'%')
                    ->orWhere('area','like','%'.$request['search_field'].'%')
                    ->orWhere('location','like','%'.$request['search_field'].'%')
                    ->get();
        
        return view('admin/client/showClients',['clients'=>$clients]);
  
    }

    public function suspend($id){
        $client=Client::find($id);
        $client->delete();
        return redirect()->route('all-clients');
    }

    public function showSuspended(){
        $clients=Client::onlyTrashed()->get();
        return view('admin/client/showSuspended',['clients'=>$clients]);
    }

    public function searchSuspended(Request $request){
        $clients=Client::withTrashed()
                ->where(function ($query) use ($request){
                    $query->where('name','like','%'.$request['search_field'].'%')
                          ->orWhere('phone','like','%'.$request['search_field'].'%')
                          ->orWhere('email','like','%'.$request['search_field'].'%')
                          ->orWhere('city','like','%'.$request['search_field'].'%')
                          ->orWhere('zone','like','%'.$request['search_field'].'%')
                          ->orWhere('area','like','%'.$request['search_field'].'%')
                          ->orWhere('location','like','%'.$request['search_field'].'%');
                } )
                ->onlyTrashed()
                ->get();
        
        return view('admin/client/showSuspended',['clients'=>$clients]);
  
    }

    public function restore($id){
        $client=Client::onlyTrashed()
                    -> where('id',$id)
                    ->first();
        $client->restore();

        return redirect()->route('all-clients');
    }

}
