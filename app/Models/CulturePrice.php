<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'culture_id', 'price_sell', 'price_buy', 'date'
    ];
}
