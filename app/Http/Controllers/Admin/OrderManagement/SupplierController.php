<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order\Order;
use Spatie\Permission\Models\Role;

class SupplierController extends Controller
{
    public function ordersList($status){
        $orders=Order::with('clients','order_items','payments')
                    ->where('delivery_status',$status)
                    ->orderBy('order_date','desc')
                    ->get();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/supplier/pendingSupply',['orders'=>$orders,'suppliers'=>$suppliers,'status'=>$status]);
    }

    public function details($order_id){
        $order=Order::with('clients','order_items','payments')
                    ->where('order_id',$order_id)
                    ->first();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/supplier/supplyDetails',['order'=>$order,'suppliers'=>$suppliers]);
    }

    public function receive($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='processed';
        $order->save();
        return redirect()->back();
        
    }
    public function deny($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='cancelled';
        $order->save();
        return redirect()->back();
    }

}
