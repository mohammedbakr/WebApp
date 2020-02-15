<footer class="footer-section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <ul class="footer-menu">
                    <li> <a href="{{ route('accounts', ['tab' => 'profile']) }}">{{trans('main.footer.Your account')}}</a>  </li>
                    <li> <a href="">{{trans('main.footer.Contact us')}}</a>  </li>
                    <li> <a href="">{{trans('main.footer.Terms of service')}}</a>  </li>
                </ul>

                <ul class="footer-social">
                    <li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a> </li>
                    <li> <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-pinterest-p" aria-hidden="true"></i>  </a> </li>
                </ul>

                <div>
                    <p>&copy; <a href="http://visionalization.com" target="_blank">VTS</a> | {{trans('main.footer.All Rights Reserved')}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>