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
            $table->foreignId('category_id');
            $table->bigInteger('price');
            $table->bigInteger('toilets')->nullable();
            $table->foreignId('user_id');
            $table->string('condition')->nullable();
            $table->string('image')->nullable();
            $table->string('address');
            $table->bigInteger('bathrooms')->nullable();
            $table->string('measurement');
            $table->foreignId('house_id')->nullable();
            $table->string('city');
            $table->foreignId('state_id')->nullable();
<<<<<<< HEAD
            $table->text('additional')->nullable();
            $table->string('status')->nullable();
            $table->uuid('reference')->nullable();
=======
            $table->text('additionals')->nullable();
            $table->string('status')->nullable();
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
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
