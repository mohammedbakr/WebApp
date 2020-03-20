@extends('layouts.front.app')

@section('content')
<div class="container">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-address-card"></i> {{trans('main.address.Update')}}</div>
            <div class="panel-body">
                <form action="{{ route('comprojects.updateStaff', $customer->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="company_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="projectid" value="{{auth()->user()->projects[0]->id}}">
                    
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">{{trans('main.front.Name')}} <i class="fa fa-user"></i></label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">{{trans('main.front.Email')}} <i class="fa fa-envelope"></i></label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $customer->email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="col-md-4 control-label">Role <i class="fa fa-user"></i></label>
                        <div class="col-md-6">
                            <select name="company" id="company" class="form-control" required>
                                <option value="0" disabled selected>Select</option>
                                <option value="4">Purchasing Manager</option>
                                <option value="3">Accountant</option>
                                <option value="2">Engineer</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-block">{{trans('main.address.Update')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
