
    @include('admin/includes/styling')

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title bg_bl" style="border: 0;">
            <a href={{route('admin.dashboard')}} class="site_title text-center pl-2 pr-2">
            <!-- <i class="fa fa-paw"></i> <span>ComedyDrive</span> -->
            <img src="{{asset('assets/images/logo.png')}}" height="35" width="30" class="logo footer_logo" 
            style="margin-top: -9px;">
            <p class="d_in admin-logo">Comedy Drive</p>
            </a>
        </div>
        <div class="clearfix"></div>
        <br/>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section mb-3">
            <h3 class="pt-2 pb-2 text-light bg_bl">Dashboard</h3>
            <ul class="nav side-menu">
                <li><a href={{route('admin.dashboard')}}><i class="fas fa-link"></i> &nbsp; Dashboard</a></li>
            </ul>
            </div>
            <div class="menu_section mb-3">
                <h3 class="pt-2 pb-2 text-light bg_bl">Modules</h3>
                <ul class="nav side-menu">
                    <li><a href={{route('admin.students.list')}}><i class="fas fa-link"></i> &nbsp; Students </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- top navigation -->
<div class="top_nav ">
    <div class="nav_menu bg_bd">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars text-white"></i></a>
        </div>
        <nav class="nav navbar-nav" style="padding: 6px 10px 6px 10px;">
            <ul class=" navbar-right text-white">
            <li class="nav-item dropdown open text-white" style="padding-left: 15px;">
            
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" >
                <span class="font-weight-bold ml-1 text-white">{{ auth()->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item "  href={{route('logout')}}><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
            </li>
                </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->