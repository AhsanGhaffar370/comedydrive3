@extends('front/layout/layout')

@section('page_title','| Question')

@section('content')

<div class="mainBanner inner">
         <div class="container">
            <div class="inner-text">
               <h1>GOT QUESTIONS?</h1>
               <h3>Chill...! We Got the Answers.</h3>
            </div>
         </div>
         
      </div>
      <section class="question-sec">
         <div class="container">
            <div class="question-wrap">
               <div class="question">
                  <span><img src="{{asset('{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Is it secure to send my credit card information over the Internet?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Yes, due to the sensitive nature of credit card transactions, 3D Defensive Driving uses a secure site for your credit card information.</a>
               </div>
               
               <div class="answers extra">
                  <p> <b>If you can't get on the website's home page or log in page,</b> run this test to see if the website is down, or your computer is unable to connect to it for some other reason - <a href="http://www.isitdownrightnow.com/comedysafedriver.com.html">http://www.isitdownrightnow.com/comedysafedriver.com.html</a></p>
                  <p> <b>If the site is UP but you cant access the page, try one of the below solutions:</b></p>
               </div>
               <div class="answers coloured">
                  <p> <b>#1 Browser Related Problems</b></p>
                  <p>Force a full refresh for the site. This can be achieved by pressing CTRL + F5 keys at the same time on your favourite browser (Firefox, Chrome, Explorer, etc.) Clear the temporary cache and cookies on your browser to make sure that you have the most recent version of the web page.</p>
                  <p> <b>#2 Fix DNS Problems</b></p>
                  <p>
                     A Domain Name System (DNS) allows a site IP address (192.168.x.x) to be identified with words (*.com) in order to be remembered more easily, like a phonebook for websites. This service is usually provided by your ISP.
                  Clear your local DNS cache to make sure that you grab the most recent cache that your ISP has. For Windows - (Start > Command Prompt > type "ipconfig /flushdns" and hit enter).</p>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Is it secure to send my credit card information over the Internet?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Yes, due to the sensitive nature of credit card transactions, 3D Defensive Driving uses a secure site for your credit card information.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> What happens if I get disconnected?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#">If you get disconnected from your internet provider for any reason, simply reconnect and log back into the course. You will start on the segment you left off and your performance will not be affected.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Which browsers can I use for this course?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Our course is compatible with all browsers. If you have trouble with your browser, let us know. You can just download another browser and try it. We recommend Google Chrome, it's free and quick to instal.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> What happens if I have problems while taking the course or the system malfunctions for any reason?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> If you experience any problem while taking the course, please call 1-888-822-3340 for assistance during normal business hours. At 3D Defensive Driving, you can also reach technical staff that can assist you 24 hours a day, seven days a week with any problems you may experience by calling 1-888-822-3340.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> How long does it take to complete the course?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> All courses approved by the Texas Education Agency take 6 hours to complete. While some students choose to complete the course all in one sitting, you may choose to complete the course a little at a time, logging in and out the course around your schedule. The course will automatically keep track of your progress, so when you log back into the course, you will pick up where you left off. You have up to 90 days to complete the entire course.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> How do I receive a Certificate of Completion?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> After completing the course, you will receive a State issued Certificate of Completion via US Mail within 7-10 business days. If you prefer, overnight delivery via United Parcel Service is available for $35.00. To receive your Certificate the following business day, you must complete the course by 11:00 am. The State issued Certificate of Completion is a multi-part perforated mailer that contains one "court" copy and one "insurance" copy. For ticket dismissals, sign the court copy and forward it to the court per their instructions. For insurance discounts of up to 10%, submit the insurance copy to your insurance company.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Is there a money back guarantee?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Yes. You may receive a full refund within 30 days from the receipt of refund request unless you have completed the course passed or failed. If you fail a completion section three times, Comedy Safe Driver cannot give you a refund - according to state policies. In addition if you fail to provide the correct answers for the personal validation questions and/or affidavit you will not receive a refund. If you have not successfully completed the course within 120 days, your registration will be cancelled automatically and you will not be eligible for a refund.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> What is the operation and conduct policy?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> No credit or completion will be given if the course is completed by anyone other than you or if you are assisted by an outside party. When you enroll in the course you are stating under penalty of perjury that you, and not another person, studied the material in its entirety and completed the chapter questions. By registering for the course, you understand that it may be a felony to make false statements or to falsify documents submitted to the court.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> What is Comedy Safe Driver's privacy policy?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> The information our company collects about you is subject to our privacy policy. By disclosing information to Comedy Safe Driver, you are agreeing to the terms of this privacy policy. We recognize the importance of protecting the privacy of our students and visitors to our website while permitting us to conduct legitimate business by providing services and information of interest to our students and visitors.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Can I begin the course from one computer and resume from another?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Yes. You may begin the course on one computer and resume it from a different computer. The course will automatically keep track of your progress, so when you log back into the course you will pick up where you left off.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> What is Comedy Safe Driver's Security Policy?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#"> Comedy Safe Driver undertakes extensive precautions to ensure the security of your information both online and offline. Private information that you enter in the registration form (i.e., personal and financial information) is encrypted and protected by SSL, the finest encryption software available. While on a secure page, the lock icon on the bottom of your web browser will appear in the locked position. We also protect your private information offline. We limit access to the information to a very select group of qualified employees, and only when that information is needed in order to perform necessary tasks. All of our employees receive training on our privacy and security policies. In addition, the servers on which we store our students' information are maintained in a secure environment.</a>
               </div>
               <div class="question">
                  <span><img src="{{asset('assets/images/q.png')}}" alt=""></span>
                  <a href="#"> Is there a final exam?</a>
               </div>
               <div class="answers">
                  <span><img src="{{asset('assets/images/a.png')}}" alt=""></span>
                  <a href="#">Yes. After completing the lessons of text and videos, you will take a 20 question, multiple-choice final exam. You have 3 opportunities to pass the exam at no extra charge. If you fail the final exam all three times and wish to take the course again you will have to re-enroll and pay the appropriate course fees again.</a>
               </div>
            </div>
         </div>
      </section>
@endsection