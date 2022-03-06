<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $tables = 'orders';
    protected $fillable = [
        'name',
        'email',
        'pickup',
        'dropoff',
        'weight',
        'distance',
        'phone',
        'freight',
        'tracking_id',
        'status'
    ];
}
