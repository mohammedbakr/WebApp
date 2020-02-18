<section class="subscribe-section">
    @if(session()->has('message'))
    <div class="box no-border">
        <div class="box-tools">
            <p class="alert alert-success alert-dismissible">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
    @elseif(session()->has('error'))
    <div class="box no-border">
        <div class="box-tools">
            <p class="alert alert-danger alert-dismissible">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
    @endif
        <div class="container text-center">
            <h4>Subscribe To our News Letter</h4>
            <div class="form">
            <form action="/action_page.php">
                {{csrf_field()}}
                <input type="email" name="email" class="newsletter-input subscribe-form-control"
                placeholder="{{trans('main.footer.Your email address')}}" value="">
                <div class="btn-s">
                    <button type="submit" class="btn btn-subscribe">{{trans('main.footer.Subscribe')}}</button>
                </div>
            </form>
            </div>
        </div>
</section>