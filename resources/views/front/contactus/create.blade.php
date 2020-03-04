
@extends('layouts.front.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<style>
    .my-contact {
        margin: 40px auto;
        border: 2px solid #EEE;
        padding: 15px;
    }
    .my-contact h2 {color: #444}
    .my-contact .contact-form {max-width: 450px; margin: 10px auto;}
    .my-contact .contact-form input,
    .my-contact .contact-form textarea {
        margin: 15px auto;
    }
    .my-contact .contact-form textarea {
        resize: none;
    }
    .my-contact .contact-form input:not([type='submit']) + i {
        height: 0;
        float: left;
        position: relative;
        top: -40px;
        left: 25px;
        color: #999;
    }
    .my-contact .contact-form input:not([type='submit']) + i:nth-of-type(3) {
        font-size: 26px;
        top: -44px;
        left: 18px;
    }
    .my-contact .contact-form input[type='submit'] {
        padding-left: 32px;
    }
    .my-contact .contact-form i.my-icon{
        position: relative;
        display: block;
        top: -39px;
        left: 10px;
        color: #FFF;
    }
</style>
    <title>Awtad/Contact Us</title>
</head>
<body>
    


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

        </form>
    </div>
</section> 

@endsection
