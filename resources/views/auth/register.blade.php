@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if(request()->input('tab') == 'Individual') class="active" @endif><a
                    href="#Individual" aria-controls="Individual" role="tab"
                    data-toggle="tab">Individual</a></li>
            <li role="presentation" @if(request()->input('tab') == 'Company') class="active" @endif><a
                    href="#Company" aria-controls="Company" role="tab"
                    data-toggle="tab">Company</a></li>
        </ul>
        <!-- Tab panes -->

        <div class="tab-content customer-order-list">
            {{-- Start Individual Form --}}
            <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'Individual') active @endif"
                id="Individual">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-address-card"></i> {{trans('main.front.Register')}}</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
        
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">{{trans('main.front.Register')}} <i class="fa fa-user"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="{{trans('main.front.Register')}}">
        
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
        
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">{{trans('main.front.Confirm Password')}} <i class="fa fa-unlock"></i></label>
        
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
            {{-- End Individual Form --}} 

            {{-- Start Company Form --}}

            <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'Company') active @endif"
                id="Company">


                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-building"></i> Register For Company</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
        
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name <i class="fa fa-user"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Full Name">
        
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address <i class="fa fa-envelope"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@example.com">
        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password <i class="fa fa-unlock"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password <i class="fa fa-unlock"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder=" Confirm Password">
                                    </div>
                                </div>



                                {{-- Start add more inputes --}}
                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Upload <i class="fa fa-upload"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="" type="file" class="form-control" name="" value="" placeholder="Upload Your File">
        
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Upload <i class="fa fa-upload"></i></label>
        
                                    <div class="col-md-6">
                                        <input id="" type="file" class="form-control" name="" value="" placeholder="Upload Your File">
        
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- End add more inputes --}}


        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            {{-- End Company Form --}}

        </div>

        




        
    </div>
</div>
@endsection
