<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>متجر اوتاد</title>
    <meta name="description" content="Modern open-source e-commerce framework for free">
    <meta name="tags" content="modern, opensource, open-source, e-commerce, framework, free, laravel, php, php7, symfony, shop, shopping, responsive, fast, software, blade, cart, test driven, adminlte, storefront">
    <meta name="author" content="Jeff Simons Decena">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('modifiedstyle.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
@yield('og')
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Modified CSS -->
    <link rel="stylesheet" href="{{ asset('css/modifiedstyle.css') }}">
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
       <ul class="headxs">
           @if(auth()->check())
           <sd class=""><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> حسابي</a></sd>
           <sd class=""><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>تسجيل خروج</a></sd>
           @else
               <sd><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> تسجيل دخول</a></sd>
               <sd><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> تسجيل</a></sd>
           @endif
       </ul>

<hr>

<section>
 <ul class="headxsd">
      <li>
         <a class="navbar-brand" href="{{ route('home') }}">اوتاد</a>
     </li>
     <li id="cart" class="menubar-cart">  <span class="cart-number">{{ $cartCount }}</span>
         <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart"><i id="icon" class="fa fa-shopping-bag" aria-hidden="true"></i>
       </a>
    </li>
     <li>
      <form action="{{route('search.product')}}" method="GET" id="malek">
  <input action="{{route('search.product')}}" method="GET" id="searshtab"   type="text" name="q" class="form-control2" placeholder="بحث .." value="{!! request()->input('q') !!}">

      </form>
     </li>

       </ul>

    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Bootstrap 3
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-folder"></i> Page one</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-file-o"></i> Second page</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Third page</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Dropdown heading</li>
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-bank"></i> Page four</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-dropbox"></i> Page 5</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-twitter"></i> Last page</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        </div>
</section>
@yield('content')
@include('layouts.front.footer')
<script src="{{ asset('js/front.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('js')
</body>
</html>
<style>
    .headxs {
        list-style-type: none;
        margin-left: 10px;
        margin-bottom: 1px;
        padding: 0;
        overflow: hidden;
        background-color: #fff;
        font-size: 12px;
    }
    #malek {
        list-style-type: none;
        overflow: hidden;

    }
    .headxsd {
        list-style-type: none;
        margin-left: 10px;
        padding: 0;
        overflow: hidden;
        background-color: #fff;
        font-size: 12px;
    }

    sd {
        float: left;
        border-right:1px solid #bbb;
    }

    sd:last-child {
        border-right: none;
    }
    sd:last-child:after {
        border-right: none;
    }
    sd a {
        display: block;
        color: gray;
        text-align: center;
        text-decoration: none;
        padding-right: 4px;
        padding-left:4px;
    }
    sd a:hover:not(.active) {
color: #85b4ff
    }
    #searshtab {
        margin-right: 10%;
        display: block;
        width: 30%;
        height: 40px;
        font-size: 14px;
        border: 2px solid #85b4ff;
        line-height: 1.42857143;
        color: #555555;
        background-color: #fff;
        background-image: none;
        border-radius: 25px !important;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    }
    #searshtab:focus {
        margin-right: 10%;
        display: block;
        width: 40%;
        height: 40px;
        transition: all 400ms ease;
        border: #0c85d0 4px solid;
        box-sizing: border-box;
    }
    #searshtab:hover {
  background-color: #f0fbfc;
        border: 2px solid #0c85d0;
        transition: all 450ms ease;

    }


    .nav .open > a {
        background-color: transparent;
    }
    .nav .open > a:hover {
        background-color: transparent;
    }
    .nav .open > a:focus {
        background-color: transparent;
    }
    /*-------------------------------*/
    /*           Wrappers            */
    /*-------------------------------*/
    #wrapper {
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        padding-left: 0;
        transition: all 0.5s ease;
    }
    #wrapper.toggled {
        padding-left: 220px;
    }
    #wrapper.toggled #sidebar-wrapper {
        width: 220px;
    }
    #wrapper.toggled #page-content-wrapper {
        margin-right: -220px;
        position: absolute;
    }
    #sidebar-wrapper {
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -webkit-transition: all 0.5s ease;
        background: #1a1a1a;
        height: 100%;
        left: 220px;
        margin-left: -220px;
        overflow-x: hidden;
        overflow-y: auto;
        transition: all 0.5s ease;
        width: 0;
        z-index: 1000;
    }
    #sidebar-wrapper::-webkit-scrollbar {
        display: none;
    }
    #page-content-wrapper {
        padding-top: 70px;
        width: 100%;
    }

    /*-------------------------------*/
    /*       Hamburger-Cross         */
    /*-------------------------------*/
    .hamburger {
        background: transparent;
        border: none;
        display: block;
        height: 32px;
        margin-left: 15px;
        position: fixed;
        top: 20px;
        width: 32px;
        z-index: 999;
    }
    .hamburger:hover {
        outline: none;
    }
    .hamburger:focus {
        outline: none;
    }
    .hamburger:active {
        outline: none;
    }
    .hamburger.is-closed:before {
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all 0.35s ease-in-out;
        color: #ffffff;
        content: '';
        display: block;
        font-size: 14px;
        line-height: 32px;
        opacity: 0;
        text-align: center;
        width: 100px;
    }
    .hamburger.is-closed:hover before {
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all 0.35s ease-in-out;
        display: block;
        opacity: 1;
    }
    .hamburger.is-closed:hover .hamb-top {
        -webkit-transition: all 0.35s ease-in-out;
        top: 0;
    }
    .hamburger.is-closed:hover .hamb-bottom {
        -webkit-transition: all 0.35s ease-in-out;
        bottom: 0;
    }
    .hamburger.is-closed .hamb-top {
        -webkit-transition: all 0.35s ease-in-out;
        background-color: rgba(255, 255, 255, 0.7);
        top: 5px;
    }
    .hamburger.is-closed .hamb-middle {
        background-color: rgba(255, 255, 255, 0.7);
        margin-top: -2px;
        top: 50%;
    }
    .hamburger.is-closed .hamb-bottom {
        -webkit-transition: all 0.35s ease-in-out;
        background-color: rgba(255, 255, 255, 0.7);
        bottom: 5px;
    }
    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom,
    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        height: 4px;
        left: 0;
        position: absolute;
        width: 100%;
    }
    .hamburger.is-open .hamb-top {
        -webkit-transform: rotate(45deg);
        -webkit-transition: -webkit-transform 0.2s cubic-bezier(0.73, 1, 0.28, 0.08);
        background-color: #fff;
        margin-top: -2px;
        top: 50%;
    }
    .hamburger.is-open .hamb-middle {
        background-color: #fff;
        display: none;
    }
    .hamburger.is-open .hamb-bottom {
        -webkit-transform: rotate(-45deg);
        -webkit-transition: -webkit-transform 0.2s cubic-bezier(0.73, 1, 0.28, 0.08);
        background-color: #fff;
        margin-top: -2px;
        top: 50%;
    }
    .hamburger.is-open:before {
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all 0.35s ease-in-out;
        color: #ffffff;
        content: '';
        display: block;
        font-size: 14px;
        line-height: 32px;
        opacity: 0;
        text-align: center;
        width: 100px;
    }
    .hamburger.is-open:hover before {
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all 0.35s ease-in-out;
        display: block;
        opacity: 1;
    }
    /*-------------------------------*/
    /*          Dark Overlay         */
    /*-------------------------------*/
    .overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    /* SOME DEMO STYLES - NOT REQUIRED */



</style>
<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });

</script>