
    @include('styling')

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
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</header>