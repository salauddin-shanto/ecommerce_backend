<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Order\VendorBalance;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class VendorBalanceController extends Controller
{
    public function index(){
        $operators = User::with('vendor_balances')
                        ->role('Courier Operator')
                        ->paginate(15);
        /* 
        $operatorRole=Role::where('name','Courier Operator')->first();
        $operators=User::with('vendor_balances')
                        ->role($operatorRole)
                        ->get();
 */
        return view('admin/transactions/operatorBalance',['operators'=>$operators]);
    }

    public function search(Request $request){
        $operators = User::with('vendor_balances')
                        ->role('Courier Operator')
                        ->where('name','like','%'.$request->input('search_field').'%')
                        ->paginate(15);
        return view('admin/transactions/operatorBalance',['operators'=>$operators]);
    }
    
    public function clearDeposit($vendor_balance_id){
        $vendor=VendorBalance::find($vendor_balance_id);
        $vendor->amount=0.00;
        $vendor->save();
        return redirect()->back();
    }

}
