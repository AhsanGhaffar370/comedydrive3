<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
    protected $table = 'student_details';

    protected $fillable = [
        'user_id',
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
        'bank_checking_account_no',
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
    
    public function state() {
        return $this->belongsTo(State::class, 'state_id'); // state_id is a fk column in this table.
    }
    
    public function drivers_license_state() {
        return $this->belongsTo(State::class, 'drivers_license_state_id'); // drivers_license_state_id is a fk column in this table.
    }
    
    public function certificate_mailing_state() {
        return $this->belongsTo(State::class, 'certificate_mailing_state_id'); // certificate_mailing_state_id is a fk column in this table.
    }
    
    public function course() {
        return $this->belongsTo(Course::class, 'course_id'); // course_id is a fk column in this table.
    }
    
    public function county() {
        return $this->belongsTo(County::class, 'county_id'); // county_id is a fk column in this table.
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // user_id is a fk column in this table.
    }
}
