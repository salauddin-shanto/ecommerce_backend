<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Arias extends Model
{
    use HasFactory;
    protected $table='arias';
    protected $primary_key='aria_id';

    public function users(){
        return $this->hasMany(User::class,'aria','aria_id');
    }
}
