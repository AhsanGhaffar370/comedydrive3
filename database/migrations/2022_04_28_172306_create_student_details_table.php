<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id'); // FK 
            $table->integer('state_id'); // FK 
            $table->integer('course_id'); // FK 
            $table->integer('county_id'); // FK 
            $table->string('case_number')->nullable();
            $table->string('citation_number')->nullable();
            $table->string('citation_due_date')->nullable();
            $table->string('citation_court_due_date')->nullable();
            $table->string('course_completion_certificate_price')->nullable(); 

            $table->string('payment_type')->nullable(); 
            $table->string('bank_name')->nullable(); 
            $table->string('bank_account_name')->nullable(); 
            $table->string('bank_checking_account_no')->nullable(); 
            $table->string('bank_account_routing_no')->nullable(); 
            $table->string('bank_account_type')->nullable(); 
            $table->string('billing_zipcode')->nullable(); 


            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('telephone')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->integer('drivers_license_state_id')->nullable(); // FK 
            $table->string('drivers_license_number')->nullable();
            $table->string('license_plate_number')->nullable();
            $table->string('non_texas_license_name')->nullable();
            $table->string('non_texas_license_address')->nullable();
            $table->string('non_texas_license_city')->nullable();
            $table->string('non_texas_license_zipcode')->nullable();
            $table->string('non_texas_license_dob')->nullable();
            $table->string('non_registered_vehicle_lastname')->nullable();
            $table->string('non_registered_vehicle_address')->nullable();
            $table->string('non_registered_vehicle_city')->nullable();
            $table->string('non_registered_vehicle_state')->nullable();
            $table->string('non_registered_vehicle_zipcode')->nullable();
            $table->string('non_registered_vehicle_year')->nullable();
            $table->string('non_registered_vehicle_make')->nullable();
            $table->string('non_registered_vehicle_expire_year')->nullable();
            $table->string('non_registered_vehicle_model')->nullable();
            
            $table->string('ssn_no')->nullable();
            $table->string('dps_audit_no')->nullable();
            
            $table->string('certificate_mailing_address')->nullable();
            $table->string('certificate_mailing_city')->nullable();
            $table->integer('certificate_mailing_state_id')->nullable(); // FK 
            $table->string('certificate_mailing_zipcode')->nullable();

            $table->string('form_step')->default('1');
            $table->string('course_step')->default('1.1');
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
