<?php

namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\VendorBalance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CourierController extends Controller
{ 
    public function percelList($status){
        if($status=='received'){
            $status='received by courier manager';
        }
        $orders=Order::with('clients','order_items','payments','users')
                    ->where('delivery_status',$status)
                    ->where('operator_id',Auth::user()->id)
                    ->orderBy('order_date','desc')
                    ->paginate(15);
        return view('admin/order/operator/pendingparcels',['orders'=>$orders,'status'=>$status]);
    }

    
    public function receiveParcel($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='received by courier manager';
        $order->operator_id=Auth::user()->id;
        $order->save();
        return redirect()->back();
        
    }

    public function sentToCourier($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='sent to courier';
        $order->save();
        return redirect()->back();
        
    }
    
    public function deliveredToCustomer($order_id){
        $order=Order::with('payments')
                    ->where('order_id',$order_id)
                    ->first();

        $order->delivery_status='delivered to customer';
        $order->save();

        $payment=$order->payments;
        $payment->payment_status='full';
        $payment->save();


        $vendor=VendorBalance::where('vendor_id',Auth::user()->id)->first();

        if($vendor){
            $vendor->amount += $order->payments->due;
            $vendor->save();
        }
        else{
            $vendor=new VendorBalance();
            $vendor->vendor_id=Auth::user()->id;
            $vendor->amount=$order->payments->due;
            $vendor->save();
        }
        
        return redirect()->back();
        
    }

    public function returnedParcel($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='returned by customer';
        $order->save();
        return redirect()->back();
        
    }
/* 
    public function details($order_id){
        $order=Order::with('clients','order_items','payments')
                    ->where('order_id',$order_id)
                    ->first();
        $suppliers=Role::where('name', 'Supplier')->first()->users;
        return view('admin/order/supplier/supplyDetails',['order'=>$order,'suppliers'=>$suppliers]);
    }


    public function deny($order_id){
        $order=Order::find($order_id);
        $order->delivery_status='cancelled';
        $order->save();
        return redirect()->back();
    } */

}