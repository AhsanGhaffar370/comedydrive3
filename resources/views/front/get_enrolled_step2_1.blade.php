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
            <h1>Driving Record</h1>
         </div>
      </div>
      <form method="POST" action="{{ route('store_get_enrolled_step2_1') }}">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="field">
               <p>Since you selected to get a certified copy of your driving record. <br> Please enter the info below so it can be processed.</p>
               </div>
            </div>
            <div class="col-md-8 mt-4">
               <div class="field">
                  <input type="text" placeholder="Last 4 Digits of SSN*"  name="ssn_no" value="{{ old('ssn_no') }}" required>
               </div>
            </div>
            <div class="col-md-4">
               <div class="field">
                  <img src="{{asset('assets/images/ssn.jpg')}}" alt="">
               </div>
            </div>
            <div class="col-md-8 mt-4">
               <div class="field">
                  <input type="text" placeholder="DPS Audit Number*"  name="dps_audit_no" value="{{ old('dps_audit_no') }}" required>
               </div>
            </div>
            <div class="col-md-4">
               <div class="field">
                  <img src="{{asset('assets/images/dps_no.jpg')}}" alt="">
               </div>
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