
@include('front/includes/styling')

<header>
	<div class="main-header">
		<div class="container">
			<div class="menu-Bar">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="row align-items-center">
				<div class="col-md-3 text-center">
					<a href="./" class="logo">
					<img src="assets/images/logo.png" alt="">
					</a>
				</div>
				<div class="col-md-9">
					<div class="menuWrap">
					<ul class="menu">
                        <li class="active"><a  href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('question') }}">Got Questions?</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('course') }}">Re-Enter Course</a></li>
                        @can('student')
                            <li><a href="{{ route('student-courses') }}">Student Course</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endif
                        @can('admin')
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @endif
                        (@cannot('student'))
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('get-enrolled') }}">Register</a></li>
                        @endif
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>