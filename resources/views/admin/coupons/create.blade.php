@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.coupons.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Coupon</h2>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="code">Code <span class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" placeholder="code" class="form-control" value="{{ old('code') }}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-control">
                                <option value="fixed" selected="selected">Fixed</option>
                                <option value="percent_off">Percent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value <span class="text-danger">*</span></label>
                            <input type="text" name="value" id="value" placeholder="" class="form-control" value="{{ old('value') }}">
                        </div>
                        <div class="form-group">
                            <label for="percent_off">Percent Off <span class="text-danger">*</span></label>
                            <input type="text" name="percent_off" id="percent_off" placeholder="" class="form-control" value="{{ old('percent_off') }}">
                        </div>
                        @include('admin.shared.status-select', ['status' => 0])
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.coupons.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
