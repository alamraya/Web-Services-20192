<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- title begin -->
    <title>@yield('title')</title>
    <!-- title end -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/font-awesome.min.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/themify-icons.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/elegant-icons.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/owl.carousel.min.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/nice-select.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/jquery-ui.min.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/slicknav.min.css")}}" type="text/css" >
    <link rel="stylesheet" href="{{asset("front/css/style.css")}}" type="text/css" >
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Begin -->
    @include('layouts.includes.header')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                    @yield('breadcrumb')
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->


    <!-- content begin -->
    @yield('content')
    <!-- Content End -->

    <!-- Footer Begin -->
    @include('layouts.includes.footer')
    <!-- Footer End -->

    <!-- Js Plugins -->
    <script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
</body>

</html>
