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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('prs_code');
            $table->string('property_code')->nullable();
            $table->string('name');
            $table->string('subject');
            $table->longText('body');

            $table->foreign('prs_code')->references('prs_code')->on('prs')->onDelete('cascade');
            $table->foreign('property_code')->references('property_code')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_templates');
    }
};