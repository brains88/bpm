<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->foreignId('payment_id');
            $table->bigInteger('duration')->nullable();
            $table->dateTime('started')->nullable();
            $table->bigInteger('units');
            $table->foreignId('unit_id');
            $table->dateTime('expiry')->nullable();
            $table->string('reference');
            $table->string('status')->default('active');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('credits');
    }
}
