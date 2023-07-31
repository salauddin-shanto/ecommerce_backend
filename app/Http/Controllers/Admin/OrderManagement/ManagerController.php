<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Arias;
use App\Models\Order\Order;
use App\Models\Suppliers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ManagerController extends Controller
{
    public function ordersList($status){
        $orders=Order::with('clients','order_items','payments')
                    ->where('delivery_status',$status)
                    ->orderBy('order_date','desc')
                    ->paginate(15);
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/manager/pendingOrders',['orders'=>$orders,'suppliers'=>$suppliers,'status'=>$status]);
    }

    public function details($order_id){
        $order=Order::with('clients','order_items','payments')
                    ->where('order_id',$order_id)
                    ->first();
        $arias=Arias::all();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/manager/orderDetails',['order'=>$order,'suppliers'=>$suppliers,'arias'=>$arias]);
    }

    public function approve($order_id,Request $request){
        $validated=$request->validate([
            'supplier'=>'required',
        ]);
        $order=Order::find($order_id);
        $order->supplier_id=$request->input('supplier');
        $order->delivery_status='approved';
        $order->save();
        return redirect()->back();
        
    }

    public function cancel($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='cancelled';
        $order->save();
        return redirect()->back();
    }

    public function getSuppliers(Request $request,$aria_id){
        $supplierRole=Role::where('name','Supplier')->first();
        $suppliers=User::role($supplierRole)
                        ->where('aria',$aria_id)
                        ->get();

        return response()->json($suppliers);
    }
    
    public function search(Request $request,$status){
        $search_field=$request->input('search_field');
        $orders=Order::with('clients','order_items','payments')
                    ->where('delivery_status',$status)
                    ->where(function($query) use ($search_field){
                        $query->whereHas('clients',function($query) use ($search_field){
                            $query->where('name','like','%'.$search_field.'%')
                                ->orWhere('phone','like','%'.$search_field.'%')
                                ->orWhere('phone2','like','%'.$search_field.'%')
                                ->orWhere('email','like','%'.$search_field.'%')
                                ->orWhere('city','like','%'.$search_field.'%')
                                ->orWhere('area','like','%'.$search_field.'%')
                                ->orWhere('zone','like','%'.$search_field.'%')
                                ->orWhere('location','like','%'.$search_field.'%');
                        })->orWhereHas('payments',function($query) use ($search_field){
                            $query->where('payment_status','like','%'.$search_field.'%');
                        });
                    })
                    ->paginate(15);

        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/manager/pendingOrders',['orders'=>$orders,'suppliers'=>$suppliers,'status'=>$status]);
    

    }

}
