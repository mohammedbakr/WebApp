<section>
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
        <label>{{trans('main.sidebarfront.Categories')}}</label>
        <button id="dropdown-btn" class="dropdown-btn">
            {{-- @foreach ($categories as $category)
            <a href="{{route('front.category.slug', $category->slug)}}">{{$category->name}}</a>
            @endforeach --}}
            {{trans('main.sidebarfront.Categories')}}
            <i id="side1" class="fa fa-caret-down"></i>
        </button>
        <div id="dropdown-container" class="dropdown-container">
            <ul class="list-unstyled list-inline nav navbar-nav">
                @foreach($categories as $category)
                <li>
                    @if (app()->getLocale() == 'ar')
                    @if($category->children()->count() > 0)
                    @include('layouts.front.category-sub', ['subs' => $category->children])
                    @else
                    <a @if(request()->segment(2) == $category->slug) class="active" @endif
                        href="{{route('front.category.slug', $category->slug)}}">{{$category->name_ar}} </a>
                    @endif
                    @else
                    @if($category->children()->count() > 0)
                    @include('layouts.front.category-sub', ['subs' => $category->children])
                    @else
                    <a @if(request()->segment(2) == $category->slug) class="active" @endif
                        href="{{route('front.category.slug', $category->slug)}}">{{$category->name}} </a>
                    @endif
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        <label>{{trans('main.sidebarfront.Language')}}</label>
        @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
        <a href="{{LaravelLocalization::getLocalizedUrl($key)}}">{{$value['native']}}</a>
        @endforeach 
    </div>
</section>
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