<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    @include('layouts.front.category-nav')
    <ul class="nav navbar-nav navbar-right">
        @if(auth()->check())
            <li class="visible-xs"><a href="{{ route('accounts', ['tab' => 'profile']) }}"><i class="fa fa-home"></i> حسابي</a></li>
            <li class="visible-xs"><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> تسجيل خروج</a></li>
        @else

            <li class="visible-xs"><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> تسجيل دخول</a></li>
            <li class="visible-xs"><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> تسجيل</a></li>
        @endif
        <li id="cart" class="menubar-cart visible-xs">
            <a href="{{ route('cart.index') }}" title="View Cart" class="awemenu-icon menu-shopping-cart">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
        </li>
        <li>
            <!-- search form -->
                           <!-- /.search form -->
        </li>
            </ul>

</div><!-- /.navbar-collapse -->
<style>

</style>