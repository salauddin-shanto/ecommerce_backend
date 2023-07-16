<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Payment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;


class Shipment extends Model
{
    use HasFactory;

    protected $primaryKey = 'shipment_id';
    protected $fillable = [
        'order_id',
        'shipment_date',
        'carrier',
        'tracking_number'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
