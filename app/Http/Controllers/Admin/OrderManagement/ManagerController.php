<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Suppliers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function ordersList($status){
        $orders=Order::with('clients','order_items','payments')
                    ->where('delivery_status',$status)
                    ->orderBy('order_date','desc')
                    ->get();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/manager/pendingOrders',['orders'=>$orders,'suppliers'=>$suppliers,'status'=>$status]);
    }

    public function details($order_id){
        $order=Order::with('clients','order_items','payments')
                    ->where('order_id',$order_id)
                    ->first();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/manager/orderDetails',['order'=>$order,'suppliers'=>$suppliers]);
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

    
}
