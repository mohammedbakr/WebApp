@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        <div class="col-md-12">@include('layouts.errors-and-messages')</div>
        <div class="col-md-4 col-md-offset-4" style="margin-top: 15px; margin-bottom: 15px;">
            <h2>{{trans('main.front.Login to your account')}}</h2>
            <form action="{{ route('login') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">{{trans('main.front.Email')}}</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{trans('main.front.Email')}}" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">{{trans('main.front.Password')}}</label>
                    <input type="password" name="password" id="password" value="" class="form-control" placeholder="xxxxx">
                </div>
                <div class="row">
                    <button class="btn btn-default btn-block" type="submit">{{trans('main.front.Login')}}</button>
                </div>
            </form>
            <div class="row">
                <hr>
                <a href="{{route('password.request')}}">{{trans('main.front.I forgot my password')}}</a><br>
                <a href="{{route('register')}}" class="text-center">{{trans('main.front.No account? Register here')}}.</a>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
