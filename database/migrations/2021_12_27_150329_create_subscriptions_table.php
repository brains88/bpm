<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('membership_id');
            $table->string('reference');
            $table->string('status')->define('initialized');
            $table->dateTime('started')->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->string('duration');
            $table->foreignId('user_id');
            $table->foreignId('payment_id');
            $table->dateTime('expiry')->nullable();
            $table->integer('renewals')->default(0);
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
        Schema::dropIfExists('subscriptions');
    }
}
