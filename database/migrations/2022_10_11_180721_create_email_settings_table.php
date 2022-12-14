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
        Schema::create('email_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('prs_code');
            $table->string('email_code');
            $table->string('service_provider');
            $table->string('username');
            $table->string('password');
            $table->string('host');
            $table->string('port');
            $table->string('encryption');
            $table->string('from_name');
            $table->string('from_address');
            $table->string('reply_to_name')->nullable();
            $table->string('reply_to_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_settings');
    }
};
