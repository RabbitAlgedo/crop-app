<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CulturePrice;
use Illuminate\Http\Request;

class CulturePriceController extends Controller
{
    public function __invoke() {
        return response()->json(['cultures' => CulturePrice::all()->groupBy('culture_id')]);
    }
}
