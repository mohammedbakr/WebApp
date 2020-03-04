
@extends('layouts.front.app')

@section('content')

<section class="my-contact">
    <div class="container">

        <h2 class="text-center">{{trans('main.footer.Contact us')}}</h2>
        <form action="{{ route('contactstore') }}" class="contact-form" method="post">
            <input id="username" class="form-control" type="text" name="name" value="{{ old('name') }}"  placeholder="{{trans('main.front.Name')}}"  required>
            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
            <div>{{ $errors->first('name') }}</div>


            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="{{trans('main.front.Email')}}" required>
            <i class="fa fa-envelope fa-fw" aria-hidden="true"></i>
            <div>{{ $errors->first('email') }}</div>


            <input id="phone" class="form-control" type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="{{trans('main.footer.Mobile')}}" required>
            <i class="fa fa-mobile fa-fw" aria-hidden="true"></i>
            <div>{{ $errors->first('mobile') }}</div>

            <textarea class="form-control" name="message"  cols="30" rows="6" placeholder="Your Message">{{ old('message') }}</textarea>
            @csrf
            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}">
                @if($errors->has('g-recaptcha-response'))
                    <span class="alert alert-danger">{{$errors->first('g-recaptcha-response')}}</span>
                @endif
            </div>
            <input class="btn btn-success" type="submit" value="{{trans('main.footer.Send Message')}}">
            <i class="fa fa-paper-plane my-icon" aria-hidden="true"></i>
        </form>
    </div>
</section> 

@endsection
