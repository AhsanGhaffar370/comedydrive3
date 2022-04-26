<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>
     
</head>

<body class="bg-white">

@include('front/includes/header')

@yield('content')

@include('front/includes/footer')


</body>

</html>
