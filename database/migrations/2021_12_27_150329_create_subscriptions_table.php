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
            $table->string('plan_id');
            $table->string('reference')->nullable();
            $table->string('status');
            $table->dateTime('subscribed')->useCurrent();
            $table->string('duration');
            $table->foreignId('user_id');
            $table->dateTime('expiry');
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