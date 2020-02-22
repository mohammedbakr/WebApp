<header>
    <!-- Start Mobile NavBar -->
    <nav class="mobile-nav navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav items navbar-left">
                <li class="nav-item">
                    <span id="sideicon" onclick="openNav()">&#9776;</span>
                </li>
            </ul>
            @if (app()->getLocale() == 'ar')
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/awtad_ar.jpeg')}}" class="logo-brand" alt="Awtad" title="Awtad">
            </a>
            @else
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/awtad_en.jpeg')}}" class="logo-brand" alt="Awtad" title="Awtad">
            </a>
            @endif  
            <ul class="nav navbar-nav items navbar-right">
                <li class="nav-item">
                    <a id="fade" class="nav-link" href="#"><i id="icon" class="fa fa-search" aria-hidden="true" title="Search"></i></a>
                    <div id="fadetoggle" class="animated fadetoggle">
                        <form class="navbar-form navbar-left form-inline text-center" action="{{route('search.product')}}" name="myForm" onsubmit="return validateForm()" method="GET">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control search-field" placeholder="{{trans('main.front.Search')}}..."
                                    value="{!! request()->input('q') !!}">
                                <div class="input-group-btn">
                                    <button class="btn btn-default btn-search" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item register-dropdown">
                    <a class="nav-link" href=""><i id="ico" class="fa fa-user" title="Sign in or Register"></i>
                        <div class="register-menu">
                            @if(auth()->check())
                                <a class="nav-link reg" href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home" aria-hidden="true"></i> {{trans('main.front.My Account')}}</a>
                            
                                <a class="nav-link reg" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('main.front.Logout')}}</a>
                            @else
                                <a class="nav-link reg" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans('main.front.Login')}}</a>
                            
                                <a class="nav-link reg" href="{{ route('register', ['tab' => 'Individual']) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans('main.front.Register')}}</a>
                            @endif
                        </div>
                    </a>
                </li>
                <li id="cart" class="menubar-cart nav-item">
                    <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="cart-number">{{ $cartCount }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Mobile NavBar -->


    <!-- Start Top NavBar -->
    <nav class="top-nav navbar navbar-default">
        <div class="container">
            <a class="navbar-brand intro" href="{{ route('home') }}">{{trans('main.topnav.Welcome')}} <span title="Awtad">{{trans('main.homeslider.Awtad')}}</span> {{trans('main.topnav.Store')}}</a>
            <ul class="nav navbar-nav items">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{trans('main.topnav.Locator')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-truck" aria-hidden="true"></i> {{trans('main.topnav.Track')}}</a>
                </li> --}}
                <li class="nav-item language-dropdown">
                    <a class="nav-link" href="#"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;{{trans('main.sidebarfront.Language')}} <span class="symbol-down">&Hacek;</span>
                        <div class="language-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                        <a class="lang" href="{{LaravelLocalization::getLocalizedUrl($key)}}">{{$value['native']}}</a>                
                        @endforeach 
                        </div>
                    </a>
                </li>
                @if(auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home" aria-hidden="true"></i> {{trans('main.front.My Account')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('main.front.Logout')}}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans('main.front.Login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register', ['tab' => 'Individual']) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans('main.front.Register')}}</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- End Top NavBar -->


    <!-- Start Middle NavBar -->
    <nav class="middle-navbar navbar navbar-default">
        <div class="container">
                @if (app()->getLocale() == 'ar')
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/awtad_ar.jpg')}}" class="logo-brand" alt="Awtad" title="Awtad">
                </a>
                @else
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/awtad_en.jpg')}}" class="logo-brand" alt="Awtad" title="Awtad">
                </a>
                @endif
            <ul class="nav navbar-nav navbar-right items">
                <li class="nav-item">
                    <span class="nav-link" id="sidebars"><i id="xicon" class="fa fa-bars" aria-hidden="true" title="Side Bar"></i></span>
                </li>
                <li>
                    <br />
                </li>
                <li>
                    <br />
                </li>
                <li>
                    <br />
                </li>
                <li class="nav-item">
                    <form class="navbar-form navbar-left form-inline text-center search" action="{{route('search.product')}}" name="myForm" onsubmit="return validateForm()" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control search-field" placeholder="{{trans('main.front.Search')}}..."
                            value="{!! request()->input('q') !!}">
                        <div class="input-group-btn">
                            <button class="btn btn-default btn-search" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </li>
                <li id="cart" class="menubar-cart nav-item">
                    <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="cart-number">{{ $cartCount }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <span title="Total Money">$1785.00</span> --}}
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Middle NavBar -->
</header>
@include('layouts.front.sidebarFront')