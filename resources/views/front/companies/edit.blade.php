@extends('layouts.front.app')

@section('content')
<!-- Main content -->
<section class="container content">
    <div class="row">
        <div class="col-md-12">
            <h2> <i class="fa fa-home"></i> {{trans('main.front.My Account')}}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.errors-and-messages')
            <div class="box">
                <form action="{{ route('accounts.update', $customer->id ) }}" method="post" class="form" enctype="multipart/form-data">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">{{trans('main.front.Name')}} <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $customer->name ?: old('name')  !!}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{trans('main.front.Email')}} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $customer->email ?: old('email')  !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">{{trans('main.front.Password')}} <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                        </div>
                        @if($customer->company == 1)
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{trans('main.front.identity_card')}} <i class="fa fa-upload"></i></label>

                                <div class="col-md-8">
                                    <input id="" type="file" class="form-control" name="identity_card" value="identity_card" placeholder="Upload Your identity_card">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{trans('main.front.commerical_register')}} <i class="fa fa-upload"></i></label>

                                <div class="col-md-8">
                                    <input id="" type="file" class="form-control" name="commerical_register" value="commerical_register" placeholder="Upload Your commerical_register">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">{{trans('main.front.undertaking')}} <i class="fa fa-upload"></i></label>

                                <div class="col-md-8">
                                    <input id="" type="file" class="form-control" name="undertaking" value="undertaking" placeholder="Upload Your undertaking">
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-group">
                            <a href="{{ route('accounts') }}" class="btn btn-default btn-sm">{{trans('main.address.Back')}}</a>
                            <button type="submit" class="btn btn-primary btn-sm">{{trans('main.cart.Update')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection