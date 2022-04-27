<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>
     
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('admin/includes/header')

            <!-- page content -->
            <div class="right_col page_height" role="main" style="min-height: 1000px;">
               @yield('content')
			   @show
            </div>
            <!-- /page content -->

            @include('admin/includes/footer')
        </div>
    </div>
</body>

</html>
