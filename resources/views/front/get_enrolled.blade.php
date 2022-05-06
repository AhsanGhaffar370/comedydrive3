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
      <form method="POST" action="{{ route('register') }}">
         @csrf
         <div class="row">
            <div class="col-md-12 field">
               <select name="state_id" id="state_id" required>
                  <option value="" selected disabled>Select State*</option>
                  @foreach ($states as $state) 
                  <option value="{{$state->id}}">{{ $state->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-md-12 field">
               <select name="course_id" id="course_id" required>
                  <option value="" selected disabled>Select Course*</option>
                  @foreach ($courses as $course) 
                  <option value="{{$course->id}}">{{ $course->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-md-12 field">
               <select name="county_id" id="county_id" required>
                  <option value="" selected disabled>Select County/Court*</option>
                  @foreach ($counties as $county) 
                  <option value="{{$county->id}}">{{ $county->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="row florida_case_fields mt-5 mb-5 d_none">
               <div class="col-md-12 field">
                  <img src="{{asset('assets/images/case_number.jpg')}}" alt="">
               </div>
               <div class="col-md-12 field">
                  <input type="text" placeholder="Case Number" name="case_number" >
               </div>
            </div>
            <div class="row florida_citation_fields mt-5 mb-5 d_none">
               <br><br>
               <div class="col-md-12">
                  <div class="field">
                     <img src="{{asset('assets/images/citation.jpg')}}" alt="">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="field">
                     <input type="text" placeholder="Citation/Ticket Number" name="citation_number" >
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="field">
                     <p for="">Citation Date*</p>
                     <input type="date" placeholder="Citation Date" name="citation_due_date" >
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="field">
                     <p for="">Court Due Date*</p>
                     <input type="date" placeholder="Court Due Date" name="citation_court_due_date" >
                  </div>
               </div>
            </div>
            <div class="col-md-12 course_completion d_none">
               <div class="field">
                  <label for="">Completion Certificate Delivery Options*</label>
               </div>
               <div class="field florida_course_completion d_none">
                  <h5>Free Email Delivery! (at course completion)</h5>
               </div>
               <div class="rd-field texas_course_completion d_none">
                  <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="Regular Mail ($2.50)">
                  <label for="course_completion_certificate_price_id">Regular Mail ($2.50) - Typical 3-7 Day **Cheapest**</label><br>
                  <div class="field">
                     <h5>Hard copy of certificate sent via first class mail from Houston TX.</h5>
                  </div>
               </div>
               <div class="rd-field texas_course_completion d_none">
                  <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="Immediate Download/Email ($5.50)">
                  <label for="course_completion_certificate_price_id">Immediate Download/Email ($5.50) **Most Popular**</label><br>
                  <div class="field">
                     <h5>Upon course completion certificate will be downloadable and will also be e-mailed to you. This is a new state law as of Oct. 2018</h5>
                  </div>
               </div>
               <div class="rd-field mexico_course_completion d_none">
                  <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="Regular Mail ($2.50)">
                  <label for="course_completion_certificate_price_id">Regular Mail ($2.50) - Typical 3-7 Day **Cheapest**</label><br>
                  <div class="field">
                     <h5>Hard copy of certificate sent via first class mail from Houston TX.</h5>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <label for="">Login Details*</label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="field">
                  <input id="email" type="email"placeholder="Email"  name="email" value="{{ old('email') }}" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="field">
                  <input type="password" placeholder="Password" name="password" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <h5>Password should contain one letter, one digit and minimum 8 characters</h5>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <label for="">Payment Details*</label>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <p for="">Payment Type*</p>
                  <select name="payment_type" id="payment_type" required>
                     <option value="card">Paying by Card</option>
                     <option value="check">Paying by Check</option>
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <label for="">Your Credit Card Information*</label>
               </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <select name="card_type" id="card_type" >
                    <option value="" selected disabled>Select Card Type*</option>
                    <option value="1">Card1</option>
                    <option value="2">Card2</option>
                    <option value="3">Card3</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <input type="text" placeholder="Card Number" name="card_number">
              </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <input type="text" placeholder="Name on Card" name="card_name" >
              </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <input type="text" placeholder="Card Verification Code" name="card_code" >
              </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <select name="card_expiry_month" id="card_expiry_month" >
                    <option value="" selected disabled>Select Expiry Month*</option>
                    <option value="01-Jan">01-Jan</option>
                    <option value="02-Feb">02-Feb</option>
                    <option value="03-Mar">03-Mar</option>
                    <option value="04-Apr">04-Apr</option>
                    <option value="05-May">05-May</option>
                    <option value="06-Jun">06-Jun</option>
                    <option value="07-Jul">07-Jul</option>
                    <option value="08-Aug">08-Aug</option>
                    <option value="09-Sep">09-Sep</option>
                    <option value="10-Oct">10-Oct</option>
                    <option value="11-Nov">11-Nov</option>
                    <option value="12-Dec">12-Dec</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6 card_info_div">
              <div class="field">
                  <select name="card_expiry_year" id="card_expiry_year" >
                    <option value="" selected disabled>Select Expiry Year*</option>
                    <option value="{{ date("Y") }}">{{ date("Y") }}</option>
                    <option value="{{ date("Y", strtotime('+1 years')) }}">{{ date("Y", strtotime('+1 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+2 years')) }}">{{ date("Y", strtotime('+2 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+3 years')) }}">{{ date("Y", strtotime('+3 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+4 years')) }}">{{ date("Y", strtotime('+4 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+5 years')) }}">{{ date("Y", strtotime('+5 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+6 years')) }}">{{ date("Y", strtotime('+6 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+7 years')) }}">{{ date("Y", strtotime('+7 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+8 years')) }}">{{ date("Y", strtotime('+8 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+9 years')) }}">{{ date("Y", strtotime('+9 years')) }}</option>
                    <option value="{{ date("Y", strtotime('+10 years')) }}">{{ date("Y", strtotime('+10 years')) }}</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6 check_info_div">
              <div class="field">
                  <input type="text" placeholder="Bank Name" name="bank_name" >
              </div>
            </div>
            <div class="col-md-6 check_info_div">
              <div class="field">
                  <input type="text" placeholder="Name on the Account" name="bank_account_name" >
              </div>
            </div>
            <div class="col-md-6 check_info_div">
              <div class="field">
                  <input type="text" placeholder="Checking Account Number" name="bank_checking_account_no" >
              </div>
            </div>
            <div class="col-md-6 check_info_div">
              <div class="field">
                  <input type="text" placeholder="Checking Account Routing Number (ABA Code)" name="bank_account_routing_no" >
              </div>
            </div>
            <div class="col-md-12 check_info_div">
              <div class="field">
                  <select name="bank_account_type" id="bank_account_type" >
                    <option value="" selected disabled>Select Account Type*</option>
                    <option value="SAVINGS">SAVINGS</option>
                    <option value="CHECKINGS">CHECKINGS</option>
                    <option value="BUSINESSCHECKING">BUSINESSCHECKING</option>
                  </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="field">
                  <input type="text" placeholder="Billing Zipcode" name="billing_zipcode" required>
              </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="cbx-field">
               <label class="customCheck"  for="terms_conditions">I understand and agree with all the terms, conditions and policies.*
               <input type="checkbox"  id="terms_conditions" required>
               <span class="checkmark"></span></label><br>
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