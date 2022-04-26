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
        <form action="#">
          <div class="row">
            <div class="col-md-12">
              <div class="field">
            <select>
              <option value="0">Select state ticket was issued from*</option>
              <option value="1">from1</option>
              <option value="2">from2</option>
              <option value="3">from3</option>
            </select>
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
            <select>
              <option value="0">Select Payment Type</option>
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
       <select>
              <option value="0">Select Card Type</option>
              <option value="1">Card1</option>
              <option value="2">Card2</option>
              <option value="3">Card3</option>
            </select>
          </div>
            </div>
            <div class="col-md-6">
                <div class="field">
                           <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Card Number" name="card" required>
                        </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input type="text" placeholder="Name on Card" name="cardname" required>
                        </div>
            </div>
                <div class="col-md-6">
                <div class="field">
                           <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Card Verification Code" name="code" required>
                        </div>
            </div>
               <div class="col-md-6">
              <div class="field">
       <select>
           <option value="0">Select Expiry Month</option>
              <option value="1">Month1</option>
              <option value="2">Month2</option>
              <option value="3">Month3</option>
            </select>
          </div>
            </div>
               <div class="col-md-6">
              <div class="field">
       <select>
              <option value="0">Select Expiry Date</option>
              <option value="1">Date1</option>
              <option value="2">Date2</option>
              <option value="3">Date3</option>
            </select>
          </div>
            </div>
              <div class="col-md-12">
                <div class="field">
                           <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Billing Zipcode" name="code" required>
                        </div>
            </div>
          </div>
          
          
         
          <div class="field">
            <img src="assets/images/captcha.png" alt="">
          </div>

                 <div class="col-md-12">
                     
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