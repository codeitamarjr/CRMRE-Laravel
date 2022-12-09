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
        Schema::create('email_sent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('service_provider');
            $table->string('prs_code');
            $table->string('property_code')->nullable();
            $table->string('source');
            $table->string('recipient');
            $table->string('subject');
            $table->longText('body');
            $table->string('status');
            $table->string('error')->nullable();

            $table->foreign('prs_code')->references('prs_code')->on('person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_sent');
    }
};
