<?php

namespace Database\Seeders;

use App\Models\Culture;
use App\Models\CulturePrice;
use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(5)->create();

//        //make seller producer
//        User::factory()->create([
//            'email' => 'seller.p@seller.com',
//            'user_for' => 'SELLER',
//            'user_type' => 'PRODUCER'
//        ]);
//
//        //make seller traider
//        User::factory()->create([
//            'email' => 'seller.t@seller.com',
//            'user_for' => 'SELLER',
//            'user_type' => 'TRAIDER'
//        ]);
//
//        //make seller processor
//        User::factory()->create([
//            'email' => 'seller.r@seller.com',
//            'user_for' => 'SELLER',
//            'user_type' => 'PROCESSOR'
//        ]);
//
//        //make buyer processor
//        User::factory()->create([
//            'email' => 'buyer.r@buyer.com',
//            'user_for' => 'BUYER',
//            'user_type' => 'PROCESSOR'
//        ]);
//
//        //make buyer processor
//        User::factory()->create([
//            'email' => 'buyer.t@buyer.com',
//            'user_for' => 'BUYER',
//            'user_type' => 'TRAIDER'
//        ]);

//        Place::factory(3)->create();

        Culture::factory(10)->create();

//        CulturePrice::factory()->create([
//           'name' => 'соя',
//           'culture_id' => 1,
//           'price_sell' => 1200,
//           'price_buy' => 1150,
//           'date' => Carbon::yesterday()
//        ]);
//        CulturePrice::factory()->create([
//            'name' => 'соя',
//            'culture_id' => 1,
//            'price_sell' => 1100,
//            'price_buy' => 1050,
//            'date' => Carbon::now()->subDay(2)
//        ]);
//        CulturePrice::factory()->create([
//            'name' => 'соя',
//            'culture_id' => 1,
//            'price_sell' => 1160,
//            'price_buy' => 1190,
//            'date' => Carbon::now()->subDay(5)
//        ]);
//
//        CulturePrice::factory()->create([
//            'name' => 'ячмінь',
//            'culture_id' => 2,
//            'price_sell' => 1200,
//            'price_buy' => 1150,
//            'date' => Carbon::yesterday()
//        ]);
//        CulturePrice::factory()->create([
//            'name' => 'ячмінь',
//            'culture_id' => 2,
//            'price_sell' => 1100,
//            'price_buy' => 1050,
//            'date' => Carbon::now()->subDay(2)
//        ]);
//        CulturePrice::factory()->create([
//            'name' => 'ячмінь',
//            'culture_id' => 2,
//            'price_sell' => 1160,
//            'price_buy' => 1190,
//            'date' => Carbon::now()->subDay(5)
//        ]);
//
//        CulturePrice::factory()->create([
//            'name' => 'соя',
//            'culture_id' => 1,
//            'price_sell' => 1200,
//            'price_buy' => 1300,
//            'date' => Carbon::now()->subDay(4)
//        ]);
//
//        CulturePrice::factory()->create([
//            'name' => 'кукурудза',
//            'culture_id' => 3,
//            'price_sell' => 1200,
//            'price_buy' => 1300,
//            'date' => Carbon::now()->subDay(4)
//        ]);
//
//        CulturePrice::factory()->create([
//            'name' => 'гречка',
//            'culture_id' => 4,
//            'price_sell' => 1200,
//            'price_buy' => 1300,
//            'date' => Carbon::now()->subDay(4)
//        ]);
//
//        CulturePrice::factory()->create([
//            'name' => 'соняшник',
//            'culture_id' => 5,
//            'price_sell' => 1200,
//            'price_buy' => 1300,
//            'date' => Carbon::now()->subDay(4)
//        ]);
    }
}
