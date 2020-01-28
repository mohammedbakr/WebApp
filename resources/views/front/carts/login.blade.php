@extends('layouts.front.app')

@section('content')
    <hr>
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-md-12">@include('layouts.errors-and-messages')</div>
            <div class="col-md-5">
                <h2>{{trans('main.front.Login')}}</h2>
                <form action="{{ route('cart.login') }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="control-label">{{trans('main.front.Email')}}</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{trans('main.front.Email')}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">{{trans('main.front.Password')}}</label>
                        <input type="password" name="password" id="password" value="" class="form-control" placeholder="xxxxx">
                    </div>
                    <div class="row">
                        <button class="btn btn-primary btn-block" type="submit">{{trans('main.front.Login')}}</button>
                    </div>
                </form>
                <div class="row"><hr>
                    <a href="#">{{trans('main.front.I forgot my password')}}</a><br>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1">
                <h2>{{trans('main.front.Register')}}</h2>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">{{trans('main.front.Name')}}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">{{trans('main.front.Email')}}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">{{trans('main.front.Password')}}</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">{{trans('main.front.Confirm Password')}}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{trans('main.front.Register')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
