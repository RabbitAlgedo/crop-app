<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('place_id');
//            $table->foreignId('user_id')->references('id')->on('users');
//            $table->foreignId('place_id')->references('id')->on('places');
            $table->enum('termin', ["5", "14", "30"]);
            $table->string('month')->nullable();
            $table->enum('culture', ['SOY', 'BARLEY', 'CORN']);
            $table->enum('status', ['IN_PROGRESS', 'STOPED', 'HOLDING']);
            $table->enum('type', ['SELLING', 'BUYING']);
            $table->enum('delivery', ['CPT', 'FCA', 'EXW']);
            $table->integer('price');
            $table->integer('weight');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultures');
    }
}
