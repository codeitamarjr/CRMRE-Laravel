<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units_financial', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->references('id')->on('users');
            $table->string('unit_code')->references('unit_code')->on('units');
            $table->double('market_rent', 10, 2 );
            $table->double('quoted_rent', 10, 2 );
            $table->string('rental_type'); // fixed, variable, market
            $table->string('tenancy_type'); // lease or contract
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units_financial');
    }
};
