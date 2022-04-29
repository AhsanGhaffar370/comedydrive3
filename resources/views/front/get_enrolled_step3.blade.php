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
      <form method="POST" action="{{ route('store_get_enrolled_step3') }}">
         @csrf
         <div class="row">
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Certificate Mailing Address*"  name="certificate_mailing_address" value="{{ old('certificate_mailing_address') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Certificate Mailing City*"  name="certificate_mailing_city" value="{{ old('certificate_mailing_city') }}" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <select name="certificate_mailing_state_id" id="certificate_mailing_state_id" required>
                     <option value="" selected disabled>Select Certificate Mailing State*</option>
                     @foreach ($states as $state) 
                     <option value="{{$state->id}}">{{ $state->name }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-12">
               <div class="field">
                  <input type="text" placeholder="Certificate Mailing Zipcode*"  name="certificate_mailing_zipcode" value="{{ old('certificate_mailing_zipcode') }}" required>
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