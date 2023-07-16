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
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;


class ClientStatistics extends Model
{
    use HasFactory;

    public function clients(){
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function client_types(){
        return $this->belongsTo(ClientType::class,'client_type_id','client_type_id');
    }
}
