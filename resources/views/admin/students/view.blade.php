@extends('admin/layout/layout')

@section('page_title','| Home')

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>View Student</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />

                    <form method="post" id="cargo_form" action={{route('admin.students.update_req')}} class="form-horizontal form-label-left"
                        enctype="multipart/form-data">

                        <div class="form-group col-sm-4">
                            <label for=""> State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->state->name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Course</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->course->name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> County</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->county->name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @if(isset($user->studentDetail->case_number))
                        <div class="form-group col-sm-4">
                            <label for="">Case Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->case_number ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        @if(isset($user->studentDetail->citation_number))
                        <div class="form-group col-sm-4">
                            <label for=""> Citation Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->citation_number ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Citation Due Date</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->citation_due_date ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Citation Court Due Date</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->citation_court_due_date ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Certificate Delivery Option</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Completion Certificate Delivery Option</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->course_completion_certificate_price ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Login Details</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Email</label>
                            <input 
                                type="text" 
                                value="{{$user->email ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Password</label>
                            <input 
                                type="text" 
                                value="........" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Student Details</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> First Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->firstname ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Middle Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->middlename ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Last Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->lastname ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Telephone</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->telephone ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Gender</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->gender ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Date of Birth</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->dob ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Payment Details</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Payment Type</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->payment_type ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @if (($user->studentDetail->payment_type ?? '') == 'check')
                        <div class="form-group col-sm-4">
                            <label for="">Bank Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Bank Checking Account Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_checking_account_no ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Routing Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_routing_no ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Type</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_type ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        <div class="form-group col-sm-4">
                            <label for="">Billing Zipcode</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->billing_zipcode ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Driver License State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->drivers_license_state->name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Drivers License Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->drivers_license_number ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">License Plate Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->license_plate_number ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @if (isset($user->studentDetail->non_texas_license_name))
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Driver's License Information</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Name on Driver's License</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_texas_license_name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Address on Driver's License</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_texas_license_address ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">City on Driver's License</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_texas_license_city ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Zipcode on Driver's License</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_texas_license_zipcode ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Date of Birth on Driver's License</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_texas_license_dob ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        @if (isset($user->studentDetail->non_registered_vehicle_lastname))
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Vehicle License Plate Info. (Can Belong to family member. Doesn't need to be vehicle ticketed.)</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Owner Last Name on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_lastname ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Owner Address on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_address ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Owner City on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_city ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Owner State on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_state ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Owner Zip Code on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_zipcode ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is the Vehicle Year (Not the Registration Expiration Year) of the Vehicle?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_year ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What Vehicle Make on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_make ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What Year does your vehicleregistration expire for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_expire_year ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">What is your Model on the Vehicle Registration for the License Plate?</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->non_registered_vehicle_model ?? ''}}"      
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        @if(isset($user->studentDetail->ssn_no))
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Driving Record</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Last 4 Digits of SSN</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->ssn_no ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">DPS Audit Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->dps_audit_no ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        @endif
                        <div class="form-group col-sm-12 mt-4">
                        <h4 class="left_col text-white p-2">Certificate Mailing Address</h4>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing Address</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_address ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing City</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_city ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_state->name ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing Zipcode</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_zipcode ?? ''}}" 
                                class="form-control"
                                disabled
                                >
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection