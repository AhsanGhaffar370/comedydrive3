@extends('front/layout/layout')

@section('page_title','| Courses')

@section('content')

<div class="mainBanner renter">
         <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                   <a href="#">
                        <div class="click-btn">
                     <img src="assets/images/book.png" alt="">
                     <div class="click-text">
                        <h2>CLICK HERE</h2>
                        <p>Student Courses</p>
                     </div>
                  </div>
                  </a>
               <div class="notice-wrap">

                   <div class="notice-hd">
                  <h1>NOTICE:</h1>
                  <div class="notice-text">
                     <p>The use, publication, transmission, copying,reproduction, distribution, dissemination, sale,participation in the transfer or sale, and/or any other unauthorized use or appropriation of all or any portion or part of the training course and/or certification exam, by any means whatsoever (including but not limited to, through photographic or electronic means and/or technology) without Comedy Safe Driver's prior written authorization is prohibited and will result in appropriate legal measures being taken by Comedy Safe Driver. The modification, creation of a new work(s) from, display, or exploitation in any other way of all or any portion of Comedy Safe Driver's training and/or certification examination is also prohibited without Comedy Safe Driver's prior written authorization.</p>
                  </div>
               </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="course-wrap">
               <div class="question-hd">
                  <h1>Re-Enter Course</h1>
                  <h4>But not while you’re driving!</h4>
               </div>
              

               <form action="#">
                  <div class="field">
                      <input type="text" placeholder="Username" name="name" onkeydown="return /[a-z]/i.test(event.key)">
                  </div>
                  <div class="field">
                      <input type="passwors" placeholder="Passwors" >
                  </div>
                     

                         <div class="field">
                        <button type="submit">Login</button>
                        </div>
               </form>
            </div>
            </div>
         </div>
         </div>
         
      </div>
@endsection