<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('countries', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('region');
            $table->string('name');
            $table->string('capital');
            $table->string('phonecode');
            $table->string('currency');
            $table->string('iso3');
            $table->string('iso2');
=======
            $table->foreignId('continent_id');
            $table->string('name');
            $table->string('tld')->nullable();
            $table->string('has_division')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('emoji')->nullable();
            $table->string('capital')->nullable();
            $table->string('callingcode')->nullable();
            $table->string('currency_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('code_alpha3')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
