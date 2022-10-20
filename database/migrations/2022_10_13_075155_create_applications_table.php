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
            $table->string('applications_code')->unique();
            $table->string('property_code')->references('property_code')->on('properties')->nullable();
            $table->set('type', [ 'M', 'O', 'G' ]); // Main applicant, Occupant or Guarantor
            $table->string('main_applicant_code')->nullable(); // Carry the main applicant code if the profile is an occupant or guarantor
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->string('pps_number')->nullable();
            $table->string('email')->unique();
            $table->string('alternative_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('employment_sector')->nullable();
            $table->string('employment_position')->nullable();
            $table->string('employment_company')->nullable();
            $table->date('employment_start_date')->nullable();
            $table->string('income')->nullable();
            $table->string('extra_income')->nullable();
            $table->string('landlord_name')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->date('preferred_move_in_date')->nullable();
            $table->integer('car')->nullable();
            $table->integer('pet')->nullable();
            $table->string('pet_breed')->nullable();
            $table->string('children')->nullable();
            $table->string('children_age')->nullable();
            $table->string('hap')->nullable();
            $table->string('hap_allowance')->nullable();
            $table->longText('notes')->nullable();
            $table->set('waiting_list', [ 'yes', 'no' ])->nullable();
            $table->string('status')->nullable();
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
