<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Order;
use App\Models\Order\Shipment;
use App\Models\Order\Payment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;


class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_item_id';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'item_price'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
