<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->string('action');
            $table->bigInteger('bedrooms')->nullable();
            $table->string('category');
            $table->bigInteger('price');
            $table->bigInteger('toilets')->nullable();
            $table->foreignId('user_id');
            $table->string('state');
            $table->string('condition')->nullable();
            $table->string('image')->nullable();
            $table->string('address');
            $table->bigInteger('bathrooms')->nullable();
            $table->string('measurement');
            $table->string('city');
            $table->string('group')->nullable();
            $table->text('additional')->nullable();
            $table->string('status')->nullable();
            $table->text('reference')->nullable();
            $table->bigInteger('views')->nullable();
            $table->foreignId('currency_id');
            $table->string('listed')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
