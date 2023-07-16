<?php

namespace App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Shipment;
use App\Models\Order\Payment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey='order_id';
    protected $fillable=[
        'order_id',
        'client_id',
        'delivery_status',
        'total_price',
        'payment_status',
        'paid_amount',
        'order_date',
    ];

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id','order_id');
    }

    public function shipments(){
        return $this->hasOne(Shipment::class, 'order_id','order_id');
    }

    public function payments(){
        return $this->hasOne(Payment::class, 'order_id','order_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'supplier_id','id');
    }




/* 
    1.The related model class (Client::class).
    2.The foreign key in the current model (Order) that references the related model ('client_id').
    3.The primary key of the related model ('id').
 */
/*     
    public function refund() {
        return $this->hasOne(Refund::class);
    }

    public function status() {
        return $this->belongsTo(DeliveryStatus::class);
    }
 */



}
