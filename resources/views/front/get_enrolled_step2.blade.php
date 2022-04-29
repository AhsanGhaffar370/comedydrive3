@extends('front/layout/layout')
@section('page_title','| Get Enrolled')
@section('content')
<section class="entrolled-sec">
   <div class="container">
      @if ($errors->any())
      <div class = 'alert alert-danger' role="alert">
         <h5 class="alert-heading">Something went wrong!</h5>
         <hr>
         <div class="alert-body">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      </div>
      @endif
      <div class="contact-text">
         <div class="question-hd">
            <h1>Registration</h1>
         </div>
      </div>
      <form method="POST" action="{{ route('store_get_enrolled_step2') }}">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="First Name*"  name="firstname" value="{{ old('firstname') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Middle Name*"  name="middlename" value="{{ old('middlename') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Last Name*"  name="lastname" value="{{ old('lastname') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Telephone*"  name="telephone" value="{{ old('telephone') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <select name="gender" id="gender" required>
                     <option value="" selected disabled>Select Gender*</option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="date" placeholder="Date of Birth*"  name="dob" value="{{ old('dob') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <select name="drivers_license_state_id" id="drivers_license_state_id" required>
                     <option value="" selected disabled>Select State*</option>
                     @foreach ($states as $state) 
                     <option value="{{$state->id}}">{{ $state->name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Driver's License Number*"  name="drivers_license_number" value="{{ old('drivers_license_number') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Driver's License Plate Number*"  name="license_plate_number" value="{{ old('license_plate_number') }}" required>
               </div>
            </div>
            
         <div class="field">
            <button type="submit">Submit</button>
         </div>
      </form>
   </div>
   </div>
</section>
@endsection