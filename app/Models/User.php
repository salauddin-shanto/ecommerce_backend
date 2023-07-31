<?php

namespace App\Models;

use App\Models\Order\Order;
use App\Models\Arias;
use App\Models\Order\VendorBalance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles,HasPermissions, Notifiable;
    protected $fillable = [
        'name',
        'user_name',
        'phone',
        'phone2',
        'email',
        'password',        
        'nid',
        'aria',
        'address',
        'image',
        'created_at',
        'updated_at'
    ];

    public function orders(){
        return $this->hasMany(Order::class, 'supplier_id','id');
    }
    public function orders2(){
        return $this->hasMany(Order::class, 'operator_id','id');
    }

    public function arias(){
        return $this->belongsTo(Arias::class,'aria','aria_id');
    }
    public function vendor_balances(){
        return $this->hasOne(VendorBalance::class,'vendor_id','id');
    }
}
