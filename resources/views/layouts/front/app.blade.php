<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ env('
            GOOGLE_ANALYTICS ') }}');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    {{-- <title>Laracom - Laravel FREE E-Commerce Software</title> --}}
    <meta name="description" content="Modern open-source e-commerce framework for free">
    <meta name="tags"
        content="modern, opensource, open-source, e-commerce, framework, free, laravel, php, php7, symfony, shop, shopping, responsive, fast, software, blade, cart, test driven, adminlte, storefront">
    <meta name="author" content="Jeff Simons Decena">
    @if (app()->getLocale() == 'ar')
    <link href="{{asset('css/rtl.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/rtlmodifiedstyle.css')}}">
    @else
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modifiedstyle.css') }}" rel="stylesheet">
    @endif
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
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
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}" />
    @yield('og')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
</head>

<body>
    <noscript>
        <p class="alert alert-danger">
            You need to turn on your javascript. Some functionality will not work if this is disabled.
            <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
        </p>
    </noscript>

    <div>
    <!-- Start NavBar -->
    <nav class="navbar navbar-default" style="display:block; position: relative;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1); margin-bottom:0px;">
        <div class="container">
            <div class="clearfix"></div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span id="sideicon" onclick="openNav()">&#9776;</span>
                <a class="navbar-brand" style="margin: 0px 10px 0px 50px;" href="{{ route('home') }}">
                    @if (app()->getLocale() == 'ar')
                    <img id="brand" src="{{ asset('images/awtad_ar.jpeg')}}" alt="awtad" style="border-radius: 35px; margin: -12px 28px 0px 8px; width:60%;">
                    @else
                    <img id="brand" src="{{ asset('images/awtad_en.jpeg')}}" alt="awtad" style="border-radius: 35px; margin: -12px 8px 0px -0px; width:70%;">
                    @endif
                </a> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form id="search" class="navbar-form navbar-left form-inline text-center" action="{{route('search.product')}}"
                        method="GET" style="width:300px; border:none; margin-top:12px;">
                        <div class="input-group">
                            <input id="q" type="text" name="q" class="form-control" placeholder="{{trans('main.front.Search')}}..."
                                value="{!! request()->input('q') !!}">
                            <div class="input-group-btn">
                                <button id="btnsearch" class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @if(auth()->check())
                            <li><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> {{trans('main.front.My Account')}}</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> {{trans('main.front.Logout')}}</a></li>
                        @else
                            <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> {{trans('main.front.Login')}}</a></li>
                            <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> {{trans('main.front.Register')}}</a></li>
                        @endif
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                        <li><a href="{{LaravelLocalization::getLocalizedUrl($key)}}">{{$value['native']}}</a></li>                      
                        @endforeach                    
                        <li id="cart" class="menubar-cart">
                            <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="cart-number">{{ $cartCount }}</span>
                            </a>
                        </li>
                    </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- End NavBar -->
</div>
@include('layouts.front.sidebarFront')
                <div class="col-md-8">
                    @include('layouts.front.header-cart')
                </div>
            </div>
        </nav>
    </header>
    </section>
    @yield('content')

    @include('layouts.front.footer')

    <script src="{{ asset('js/front.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('js')
    <script src="{{ asset('js/modifiedjs.js') }}"></script>
</body>

</html>