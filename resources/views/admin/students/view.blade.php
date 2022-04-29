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
                            <label for=""> First Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->firstname ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Middle Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->middlename ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Last Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->lastname ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Email</label>
                            <input 
                                type="text" 
                                value="{{$user->email ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Password</label>
                            <input 
                                type="text" 
                                value="........" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Telephone</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->telephone ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Gender</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->gender ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Date of Birth</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->dob ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->state->name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Course</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->course->name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> County</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->county->name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Payment Type</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->payment_type ?? ''}}" 
                                required name="name"
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
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Name</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for=""> Bank Checking Account Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_checking_account_no ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Routing Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_routing_no ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Bank Account Type</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->bank_account_type ?? ''}}" 
                                required name="name"
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
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Driver License State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->drivers_license_state->name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Drivers License Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->drivers_license_number ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">License Plate Number</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->license_plate_number ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing Address</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_address ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing City</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_city ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing State</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_state->name ?? ''}}" 
                                required name="name"
                                class="form-control"
                                disabled
                                >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="">Certificate Mailing Zipcode</label>
                            <input 
                                type="text" 
                                value="{{$user->studentDetail->certificate_mailing_zipcode ?? ''}}" 
                                required name="name"
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