<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
    protected $table = 'student_details';

    protected $fillable = [
        'state_id',
        'course_id',
        'county_id',
        'case_number',
        'citation_number',
        'citation_due_date',
        'citation_court_due_date',
        'course_completion_certificate_price',
        'payment_type', //payment
        'bank_name',
        'bank_account_name',
        'bank_account_no',
        'bank_account_routing_no',
        'bank_account_type',
        'billing_zipcode',

        'firstname',
        'middlename',
        'lastname',
        'telephone',
        'gender',
        'dob',
        'drivers_license_state_id',
        'drivers_license_number',
        'license_plate_number',

        'certificate_mailing_address',
        'certificate_mailing_city',
        'certificate_mailing_state_id',
        'certificate_mailing_zipcode',
        
        'form_step',
        'course_step',
        'status',
    ];
}
