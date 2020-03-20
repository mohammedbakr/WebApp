<footer class="footer-section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <ul class="footer-menu">
                    <li> <a href="{{ route('accounts', ['tab' => 'profile']) }}">{{trans('main.footer.Your account')}}</a>  </li>
                    <li> <a href="{{route('contact')}}">{{trans('main.footer.Contact us')}}</a>  </li>
                    <li> <a href="#">{{trans('main.footer.Terms of service')}}</a>  </li>
                </ul>

                <ul class="footer-social">
                    <li> <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i>  </a> </li>
                    <li> <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i>   </a> </li>
                    <li> <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i>  </a> </li>
                    <li> <a href="#"> <i class="fa fa-pinterest-p" aria-hidden="true"></i>  </a> </li>
                </ul>
            </div>
            <div class="col-md-12 text-center">
                <p class="text-uppercase"> <span style="font-family: Arial, Helvetica, 'sans-serif';">&copy;</span> <a href="http://visionalization.com" target="_blank">VTS</a> | {{trans('main.footer.All Rights Reserved')}}</p>
            </div>
        </div>
    </div>
</footer>