<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->bigInteger('price');
            $table->text('currency')->nullable();
            $table->string('name');
            $table->bigInteger('listing');
            $table->text('details')->nullable();
            $table->text('duration')->nullable();
=======
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
        Schema::dropIfExists('plans');
    }
}
