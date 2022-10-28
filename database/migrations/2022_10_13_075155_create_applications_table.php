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
            $table->string('prs_code')->references('prs_code')->on('prs');
            $table->string('property_code')->references('property_code')->on('properties')->nullable();
            $table->set('type', [ 'Main', 'Joint', 'Guarantor' ]); // Main applicant, Joint applicant, Guarantor
            $table->string('main_applicant_id')->references('applications_id')->on('applications')->nullable(); // If type is Joint or Guarantor, this is the main applicant
            $table->string('name');
            $table->string('surname');
            $table->date('dob');
            $table->string('pps_number')->nullable();
            $table->string('email')->unique();
            $table->string('alternative_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->set('employment_status', ['Employed', 'Self-Employed', 'Unemployed', 'Student', 'Retired'] );
            $table->string('employment_sector')->nullable();
            $table->string('employment_position')->nullable();
            $table->string('employment_company')->nullable();
            $table->string('employment_phone')->nullable();
            $table->date('employment_start_date')->nullable();
            $table->string('income')->nullable();
            $table->string('extra_income')->nullable();
            $table->string('extra_income_source')->nullable();
            $table->string('landlord_name')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->date('preferred_move_out_date')->nullable();
            $table->integer('car')->nullable();
            $table->integer('pet')->nullable();
            $table->string('pet_breed')->nullable();
            $table->integer('children')->nullable();
            $table->string('children_age')->nullable();
            $table->string('HAP')->nullable();
            $table->string('HAP_allowance')->nullable();
            $table->longText('notes')->nullable();
            $table->set('waiting_list', [ 'yes', 'no' ])->nullable();
            $table->set('status', ['New', 'In Progress', 'Approved', 'Declined', 'Cancelled', 'Withdrawn', 'Archived']); // New, In Progress, Approved, Declined, Cancelled, Withdrawn, Archived
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
