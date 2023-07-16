<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Order\Order;
use App\Models\Product;
use App\Models\Order\Shipment;
use App\Models\Order\Payment;
use App\Models\Order\Cart;
use App\Models\Order\ClientStatistics;
use App\Models\Order\ClientType;
use App\Models\Order\OrderItem;
use App\Models\Order\DeliveryStatus;
use App\Models\Order\PaymentMethod;

class Client extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait , SoftDeletes;
    protected $fillable =[
        'name',
        'phone',
        'phone2',
        'email',
        'password',
        'city',
        'area',
        'zone',
        'location',
        'google_id',
        'facebook_id'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'client_id','id');
    }

    public function carts(){
        return $this->hasOne(Cart::class,'client_id','id');
    }

    public function client_statistics(){
        return $this->hasOne(ClientStatistics::class,'client_id','id');
    }
}
