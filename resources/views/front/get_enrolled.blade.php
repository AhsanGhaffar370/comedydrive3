@extends('front/layout/layout')

@section('page_title','| Get Enrolled')

@section('content')

<section class="entrolled-sec">
      <div class="container">
        <div class="contact-text">
          <div class="question-hd">
            <h1>Registration</h1>
          </div>
          
        </div>
        <form method="POST" action="{{ route('register') }}">
                        @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="field">
                <select name="state_id" id="state_id" required>
                  <option value="" selected disabled>Select State*</option>
                  <option value="1">from1</option>
                  <option value="2">from2</option>
                  <option value="3">from3</option>
                </select>
              </div>
              <div class="field">
                <select name="course_id" id="course_id" required>
                  <option value="" selected disabled>Select Course*</option>
                  <option value="1">from1</option>
                  <option value="2">from2</option>
                  <option value="3">from3</option>
                </select>
              </div>
              <div class="field">
                <select name="county_id" id="county_id" required>
                  <option value="" selected disabled>Select County/Court*</option>
                  <option value="1">from1</option>
                  <option value="2">from2</option>
                  <option value="3">from3</option>
                </select>
              </div>
              
              <div class="field">
                <img src="assets/images/captcha.png" alt="">
              </div>

              <div class="field">
                <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Citation/Ticket Number" name="citation_number" required>
              </div>

              <div class="field">
                <input onkeypress="return onlyNum(event)" maxlength="12" type="date" placeholder="Citation Date" name="citation_due_date" required>
              </div>

              <div class="field">
                <input onkeypress="return onlyNum(event)" maxlength="12" type="date" placeholder="Court Due Date" name="citation_court_due_date" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="field">
                <label for="">Completion Certificate Delivery Options*</label>
              </div>
              <div class="rd-field">
                <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="5.50">
                <label for="course_completion_certificate_price_id">Immediate Download/Email ($5.50) **Most Popular**</label><br>
                <div class="field">
                  <h5>Upon course completion certificate will be downloadable and will also be e-mailed to you. This is a new state law as of Oct. 2018</h5>
                </div>
              </div>
              <div class="rd-field">
                <input type="radio" id="course_completion_certificate_price_id" name="course_completion_certificate_price" value="2.50">
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
            <input type="email" placeholder="Email" name="email" required>
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
            <select name="payment_type" id="payment_type" required>
                  <option value="" selected disabled>Select Payment Type*</option>
              <option value="1">Payment1</option>
              <option value="2">Payment2</option>
              <option value="3">Payment3</option>
            </select>
          </div>
            </div>
             <div class="col-md-12">
              <div class="field">
        <label for="">Your Credit Card Information*</label>
          </div>
            </div>
              <div class="col-md-6">
              <div class="field">
            <select name="card_type" id="card_type" required>
              <option value="" selected disabled>Select Card Type*</option>
              <option value="1">Card1</option>
              <option value="2">Card2</option>
              <option value="3">Card3</option>
            </select>
          </div>
            </div>
            <div class="col-md-6">
                <div class="field">
                  <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Card Number" name="card_number" required>
                </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input type="text" placeholder="Name on Card" name="card_name" required>
                        </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Card Verification Code" name="card_code" required>
                        </div>
            </div>
               <div class="col-md-6">
              <div class="field">
            <select name="card_expiry_month" id="card_expiry_month" required>
              <option value="" selected disabled>Select Expiry Month*</option>
              <option value="1">Month1</option>
              <option value="2">Month2</option>
              <option value="3">Month3</option>
            </select>
          </div>
            </div>
               <div class="col-md-6">
              <div class="field">
            <select name="card_expiry_date" id="card_expiry_date" required>
              <option value="" selected disabled>Select Expiry Date*</option>
              <option value="1">Date1</option>
              <option value="2">Date2</option>
              <option value="3">Date3</option>
            </select>
          </div>
            </div>
            <div class="col-md-12">
              <div class="field">
                <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Billing Zipcode" name="card_zipcode" required>
              </div>
            </div>
          </div>
          
          
         
          <div class="field">
            <img src="assets/images/captcha.png" alt="">
          </div>

                 <div class="d_none col-md-12">
                     
                     <div class="cbx-field">
                       
                        <label class="customCheck"  for="password">Password should contain one letter, one digit and minimum 8 characters
                        <input type="checkbox"  id="password">
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