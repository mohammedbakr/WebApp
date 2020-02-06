<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i> {{trans('main.cart.Home')}}</a>
    <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart" style="color: rgba(255,255,255,.7);"></i> {{trans('main.sidebarfront.Track Order')}}</a>
    <a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home" style="color: rgba(255,255,255,.7);"></i> {{trans('main.front.My Account')}}</a>
    @if(auth()->check())
    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> {{trans('main.front.Logout')}}</a>
    @else
    <a href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i> {{trans('main.front.Login')}}</a>
    @endif
    {{-- <a href="#"><i class="fa fa-address-card"></i> About Us</a>
    <a href="#"><i class="fa fa-smile"></i> Services</a>
    <a href="#"><i class="fa fa-user-friends"></i> Clients</a> --}}
    <label for="category">{{trans('main.sidebarfront.Categories')}}</label>
    <button id="dropdown-btn1" class="dropdown-btn">{{trans('main.sidebarfront.Categories')}}
        <i id="side1" class="fa fa-caret-down"></i>
    </button>
    <div id="dropdown-container1" class="dropdown-container">
        <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
    </div>
    <button id="dropdown-btn2" class="dropdown-btn">{{trans('main.sidebarfront.Categories')}}
        <i id="side2" class="fa fa-caret-down"></i>
    </button>
    <div id="dropdown-container2" class="dropdown-container">
        <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
    </div>
    <button id="dropdown-btn3" class="dropdown-btn">{{trans('main.sidebarfront.Categories')}}
        <i id="side3" class="fa fa-caret-down"></i>
    </button>
    <div id="dropdown-container3" class="dropdown-container">
        <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
    </div>
    <button id="dropdown-btn4" class="dropdown-btn">{{trans('main.sidebarfront.Categories')}}
        <i id="side4" class="fa fa-caret-down"></i>
    </button>
    <div id="dropdown-container4" class="dropdown-container"> 
        <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
    </div>
    <button id="dropdown-btn5" class="dropdown-btn">{{trans('main.sidebarfront.Categories')}}
        <i id="side5" class="fa fa-caret-down"></i>
    </button>
    <div id="dropdown-container5" class="dropdown-container">
        <a href="#">{{trans('main.sidebarfront.Category')}} 1</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 2</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 3</a>
        <a href="#">{{trans('main.sidebarfront.Category')}} 4</a>
    </div>
    <label for="category">{{trans('main.sidebarfront.Language')}}</label>
    @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
    <a href="{{LaravelLocalization::getLocalizedUrl($key)}}">{{$value['native']}}</a>      @endforeach 
</div>
<style>
    /* width */
    .sidenav::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    .sidenav::-webkit-scrollbar-track {
        background: #111;
    }

    /* Handle */
    .sidenav::-webkit-scrollbar-thumb {
        background: #19afd0;
        opacity:0.4;
        border-radius: 10px;
    }

    /* Handle on hover */
    .sidenav::-webkit-scrollbar-thumb:hover {
        background: #19afd0;
        opacity:1;
    }
</style>