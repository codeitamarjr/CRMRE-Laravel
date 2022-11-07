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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('property_code')->unique();
            $table->string('slug')->unique()->nullable();
            $table->string('client_code');
            $table->string('type'); // Apartment, House, Land, Commercial
            $table->string('status'); // For Sale, For Rent, Sold, Rented
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('description');
            $table->string('email_code');

            $table->foreign('client_code')->references('client_code')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};