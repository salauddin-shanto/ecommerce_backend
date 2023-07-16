<?php

namespace App\Models;

use App\Models\Order\Order;
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
        'nid',
        'password',
        'image',
    ];

    public function orders(){
        return $this->hasMany(Order::class, 'supplier_id','id');
    }
}
