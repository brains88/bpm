<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_id');
            $table->bigInteger('duration');
            $table->dateTime('started');
            $table->dateTime('expiry');
            $table->foreignId('property_id')->nullable();
            $table->boolean('promoted')->default(true);
            $table->string('status');
            $table->foreignId('user_id');
            $table->foreignId('material_id')->nullable();
            $table->foreignId('artisan_id')->nullable();
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
        Schema::dropIfExists('promotions');
    }
}
