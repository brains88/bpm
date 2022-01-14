<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image')->nullable();
            $table->string('description');
            $table->string('skills')->nullable();
            $table->string('address');
            $table->foreignId('country_id');
            $table->string('qualification')->nullable();
            $table->string('idnumber')->nullable();
            $table->string('status')->default('active');
            $table->string('roles')->nullable();
            $table->string('reference');
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
        Schema::dropIfExists('profiles');
    }
}
