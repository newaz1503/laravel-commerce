<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('css')

</head>
<body>
    @include('layouts.frontend.includes.navbar')
    <div class="content">
        @yield('content')
    </div>
    {{--footer section--}}
    <div class="whatsapp-chat">
        <a href="http://wa.me/+8801743640467?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="{{asset('assets/images/whatsapp-logo.png')}}" alt="Whatsapp Logo" width="80" height="80">
        </a>
    </div>
    @include('layouts.frontend.includes.footer')

<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="{{asset('frontend/js/bootstrap-bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>

    <script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/checkout.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@yield('js')
<script>
        $( function() {
            let availableTags = [];
            $.ajax({
                method: 'GET',
                url: '/product-list',
                success: function (res) {
                    startAuthoComplete(res);
                }

            });
            function startAuthoComplete(availableTags){
                $( "#tags" ).autocomplete({
                    source: availableTags
                });
            }

        } )
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/62dadd4754f06e12d88adbad/1g8jf0ohn';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>
</html>
