<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operators extends Model
{
    use HasFactory;
    protected $table='operators';
    protected $primary_key='id';
}
