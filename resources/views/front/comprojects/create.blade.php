@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('comprojects.store') }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="coc_id" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input  required type="text" name="name" id="name" placeholder="Name" class="form-control " value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget <span class="text-danger">*</span></label>
                        <input required type="number" name="budget" id="budget" placeholder="Budget $" class="form-control" value="{{ old('budget')}}">
                    </div>
                </div>

            {{-- @include('admin.shared.status-select', ['status' => 0]) --}}
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <div class="btn-group">
                            <a href="{{ route('comprojects.index') }}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
