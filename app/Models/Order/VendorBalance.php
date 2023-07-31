<?php

namespace App\Models\Order;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBalance extends Model
{
    use HasFactory;
    protected $table='vendor_balances';
    protected $primaryKey='vendor_balance_id';
    protected $fillable = [
        'vendor_id',
        'amount'
    ];

    public function users(){
        return $this->belongsTo(User::class,'vendor_id','id');
    }
}
