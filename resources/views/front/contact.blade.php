@extends('front/layout/layout')

@section('page_title','| Cotnact Us')

@section('content')

<section class="question-sec">
         <div class="container">
            <div class="question-wrap contact-text">
               <div class="question-hd">
                  <h1>Contact Us</h1>
               </div>
              <img src="{{asset('assets/images/map.png')}}" alt="">
              <h3>Office Mailing Address:</h3>
              <p>Comedy Safe Driver 539 W Commerce St. #1266, Dallas, TX 75208</p>
              <h3>Phones:</h3>
              <a href="tel:8888223340">Contact Number - (888) 822-3340</a>
               <div class="question-hd">
                  <h1>Contact Form</h1>
               </div>

               <form action="#">
                  <div class="field">
                      <input type="text" placeholder="Name" name="name" onkeydown="return /[a-z]/i.test(event.key)" required>
                  </div>
                     <div class="field">
                           <input type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="field">
                           <input onkeypress="return onlyNum(event)" maxlength="12" type="text" placeholder="Phone" name="phone" required>
                        </div>
                         <div class="field">
                          <textarea name="textarea" placeholder="Message" ></textarea>
                        </div>

                         <div class="field">
                        <button type="submit">Send Mail</button>
                        </div>
               </form>
            </div>
         </div>
      </section>
      
@endsection