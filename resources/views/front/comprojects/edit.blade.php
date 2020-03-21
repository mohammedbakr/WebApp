@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                @include('layouts.errors-and-messages')
                <div class="box">
                    <form action="{{ route('comprojects.update', $project->id) }}" method="post" class="form">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="cust_id" value="{{auth()->user()->id}}">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input  required type="text" name="name" id="name" class="form-control " value="{{ $project->name }}">
                            </div>
                            <div class="form-group">
                                <label for="budget">Budget <span class="text-danger">*</span></label>
                                <input required type="number" name="budget" id="budget" class="form-control" value="{{ $project->budget }}">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="btn-group">
                                <div class="btn-group">
                                    <a href="{{ route('accounts', ['tab' => 'profile']) }}" class="btn btn-default">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
