<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $tables = 'abouts';
    protected $fillable = [
        'about',
        'mission',
        'vision',
    ];
}
