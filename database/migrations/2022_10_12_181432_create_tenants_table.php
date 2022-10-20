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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // Uniq identifier for tenant
            $table->string('tenants_code')->unique();
            $table->integer('profile_id')->references('id')->on('profiles');
            $table->string('unit_code')->references('unit_code')->on('units');
            $table->set('status', [ 'Active', 'Inactive', 'Terminated', 'Future', 'Past' ]);
            $table->char('rtb', 14)->nullable();
            $table->string('rtb_status')->nullable();
            $table->date('rtb_date')->nullable();
            $table->string('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
