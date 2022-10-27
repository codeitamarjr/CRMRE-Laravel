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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('property_code')->references('property_code')->on('property');
            $table->string('unit_code')->unique();
            $table->string('custom_code')->nullable();
            $table->string('name')->nullable();
            $table->string('type');
            $table->string('block');
            $table->string('floor');
            $table->string('number');
            $table->string('bedrooms');
            $table->string('postcode')->nullable();
            $table->string('car_spaces');
            $table->string('description')->nullable();
            $table->date('date_available');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
