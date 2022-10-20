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
        Schema::create('prs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // prs_code is primary
            $table->string('prs_code')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('website');
            $table->string('logo')->nullable();
            // $table->foreign('prs_code')->references('prs_code')->on('users')->onDelete('cascade');
            // $table->foreign('prs_code')->references('prs_code')->on('clients')->onDelete('cascade');
            // $table->foreign('prs_code')->references('prs_code')->on('enquiries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prs');
    }
};
