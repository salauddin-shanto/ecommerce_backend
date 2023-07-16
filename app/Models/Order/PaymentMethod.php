<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Shipment;
use App\Models\Order\Payment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $primaryKey = 'method_id';

    protected $fillable = [
        'name',
        'description'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'method_id', 'method_id');
    }
/* 
    public function refunds()
    {
        return $this->hasMany(Refund::class, 'method_id', 'method_id');
    }
     */
}
