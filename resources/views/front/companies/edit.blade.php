@extends('layouts.front.app')

@section('content')
<!-- Main content -->
<section class="container content">
    <div class="row">
        <div class="box-body">
            @include('layouts.errors-and-messages')
        </div>
        <div class="col-md-12">
            <h2> <i class="fa fa-home"></i> {{trans('main.front.My Account')}}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.errors-and-messages')
            <div class="box">
                <form action="{{ route('accounts.update', $customer->id ) }}" method="post" class="form">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $customer->name ?: old('name')  !!}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $customer->email ?: old('email')  !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label for="status">Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" @if($customer->status == 0) selected="selected" @endif>Disable</option>
                                <option value="1" @if($customer->status == 1) selected="selected" @endif>Enable</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">identity_card <i class="fa fa-upload"></i></label>

                            <div class="col-md-8">
                                <input id="" type="file" class="form-control" name="identity_card" value="identity_card" placeholder="Upload Your identity_card">

                                {{-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">commerical_register <i class="fa fa-upload"></i></label>

                            <div class="col-md-8">
                                <input id="" type="file" class="form-control" name="commerical_register" value="commerical_register" placeholder="Upload Your commerical_register">

                                {{-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">undertaking <i class="fa fa-upload"></i></label>

                            <div class="col-md-8">
                                <input id="" type="file" class="form-control" name="undertaking" value="undertaking" placeholder="Upload Your undertaking">

                                {{-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="btn-group">
                            <a href="{{ route('accounts') }}" class="btn btn-default btn-sm">Back</a>
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
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