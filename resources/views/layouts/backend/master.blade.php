<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('backend/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('backend/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('backend/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('backend/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('css')
</head>

<body class="theme-red">

@include('layouts.backend.includes.header')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
@include('layouts.backend.includes.sidebar')
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>

<!-- Jquery Core Js -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{asset('backend/plugins/node-waves/waves.js')}}"></script>
<!-- Custom Js -->
@yield('js')
<script src="{{asset('backend/js/admin.js')}}"></script>
<script src="{{asset('backend/js/pages/index.js')}}"></script>


<!-- Demo Js -->
<script src="{{asset('backend/js/demo.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
