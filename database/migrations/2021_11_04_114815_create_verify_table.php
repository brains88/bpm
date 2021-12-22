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
            $table->string('phone_token_expiry')->nullable();
            $table->string('email_token_expiry')->nullable();
            $table->string('phone_token')->nullable();
            $table->string('email_token')->nullable();
            $table->string('email_status')->nullable();
            $table->foreignId('user_id');
            $table->string('phone_status')->nullable();
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
