<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>@yield('title')</title>

    <!--font------------------------------------>
    <link rel="stylesheet" href="{{asset('files/icon/css/all.min.css')}}">

    <!--bootstrap------------------------------->
    <link rel="stylesheet" href="{{asset('files/css/bootstrap.css')}}">
    <!--owl.carousel---------------------------->
    <link rel="stylesheet" href="{{asset('files/css/owl.carousel.min.css')}}">
    <!--responsive------------------------------>
    <link rel="stylesheet" href="{{asset('files/css/responsive.css')}}">
    <!--main style------------------------------>
    <link rel="stylesheet" href="{{asset('files/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('files/css/main.cart.css')}}">
</head>

@yield('content')


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" c
        rossorigin="anonymous"></script>
<!--bootstrap-------------------------------->
<script src="{{asset('files/js/bootstrap.js')}}"></script>
<!--    owl.carousel----------------------------->
<script src="{{asset('files/js/owl.carousel.min.js')}}"></script>
<!--main----------------------------------------->
<script src="{{asset('files/js/main.js')}}"></script>

</html>
