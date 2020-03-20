@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="projectid" value="{{auth()->user()->projects[0]->id}}">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">{{trans('main.front.Name')}} <i class="fa fa-user"></i></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="{{trans('main.front.Name')}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{{trans('main.front.Email')}} <i class="fa fa-envelope"></i></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@example.com">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div  class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-md-4 control-label"> Role <i class="fa fa-user"></i></label>
                       
                        <div class="col-md-6">

                        <select name="company" id="company" class="form-control" required>
                            <option value="0" disabled selected>Select</option>
                            <option value="4">Purchasing Manager</option>
                            <option value="3">Accountant</option>
                            <option value="2">Engineer</option>
                  
                        </select>

                        @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">{{trans('main.front.Password')}} <i class="fa fa-unlock"></i></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" placeholder="xxxxxx">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">{{trans('main.front.Confirm Password')}} <i class="fa fa-unlock"></i></label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder=" {{trans('main.front.Confirm Password')}}">
                        </div>
                    </div>
                <input type="hidden" name="company_id" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{trans('main.front.Register')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
