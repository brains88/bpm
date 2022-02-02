<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify', function (Blueprint $table) {
            $table->id();
            $table->dateTime('otpexpiry')->nullable();
            $table->dateTime('tokenexpiry')->nullable();
            $table->string('otp')->nullable();
            $table->string('token')->nullable();
            $table->boolean('emailstatus')->default(false);
            $table->foreignId('user_id');
            $table->boolean('phonestatus')->default(false);
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
        Schema::dropIfExists('verify');
    }
}
