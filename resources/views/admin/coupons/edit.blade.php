@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="col-md-12">
                            <!-- Tab panes -->
                            <div class="tab-content" id="tabcontent">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2>{{ ucfirst($coupon->name) }}</h2>
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $coupon->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="code">Code <span class="text-danger">*</span></label>
                                            <input type="text" name="code" id="code" placeholder="code" class="form-control" value="{{ $coupon->code }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Type <span class="text-danger">*</span></label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="fixed" @if($coupon->type == 'fixed') selected="selected" @endif>Fixed</option>
                                                <option value="percent_off" @if($coupon->type == 'percent_off') selected="selected" @endif>Percent</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="value">Value <span class="text-danger">*</span></label>
                                            <input type="text" name="value" id="value" placeholder="" class="form-control" value="{{ $coupon->value }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="percent_off">Percent Off <span class="text-danger">*</span></label>
                                            <input type="text" name="percent_off" id="percent_off" placeholder="" class="form-control" value="{{ $coupon->percent_off }}">
                                        </div>
                                        @include('admin.shared.status-select', ['status' => 0])
                                        <!-- /.box-body -->
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="box-footer">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.coupons.index') }}" class="btn btn-default btn-sm">Back</a>
                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection