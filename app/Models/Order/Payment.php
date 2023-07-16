<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Shipment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'order_id',
        'method_id',
        'payment_status',
        'payment_date',
        'transaction_id',
        'billing_address',
        'amount',
        'due'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function payment_methods()
    {
        return $this->belongsTo(PaymentMethod::class, 'method_id', 'method_id');
    }
}
