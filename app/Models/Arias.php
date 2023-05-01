<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arias extends Model
{
    use HasFactory;
    protected $table='arias';
    protected $primary_key='aria_id';
}
