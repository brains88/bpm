<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('company_id');
            $table->string('banner');
            $table->bigInteger('duration')->nullable();
            $table->dateTime('started')->nullable();
            $table->bigInteger('expiry')->nullable();
            $table->string('status');
=======
            $table->text('companyname');
            $table->text('company_address')->nullable();
            $table->text('phonenumber')->nullable();
            $table->string('banner');
            $table->bigInteger('duration');
            $table->dateTime('started');
            $table->bigInteger('expiry');
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
        Schema::dropIfExists('adverts');
    }
}
