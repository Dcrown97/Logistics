<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $tables = 'quotes';
    protected $fillable = [
        'distancekm',
        'weightkg',
        'land',
        'air',
        'ocean',
        'distanceprice',
        'weightprice'
    ];
}
