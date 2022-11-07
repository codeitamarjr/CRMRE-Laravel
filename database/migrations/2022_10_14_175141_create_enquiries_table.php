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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email_code')->references('email_code')->on('email');
            $table->string('enquiry_id'); // Generate trough the code an unique ID
            $table->string('prs_code')->references('prs_code')->on('prs');
            $table->string('property_code')->references('property_code')->on('property')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('date')->nullable();
            $table->longText('body');
            $table->string('contact_phone')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
};
