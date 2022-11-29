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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('application_id')->unique();
            $table->string('prs_code');
            $table->string('property_code')->nullable();
            $table->string('unit_code')->nullable();
            $table->string('status')->nullable();

            $table->foreign('prs_code')->references('prs_code')->on('prs');
            $table->foreign('property_code')->references('property_code')->on('properties');
            $table->foreign('unit_code')->references('unit_code')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
