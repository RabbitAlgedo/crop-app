<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'termin',
        'month',
        'place_id',
        'culture',
        'status',
        'delivery',
        'price',
        'weight',
        'lat',
        'lng'
    ];

    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
