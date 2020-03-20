@extends('layouts.front.app')

@section('content')
<!-- Main content -->
<section class="container">
    <div class="row">
        <div class="box-body">
            @include('layouts.errors-and-messages')
        </div>
        <div class="col-md-12">
            <h4 class="pull-left"><i class="fa fa-tasks"></i> PROJECT NAME: <strong>{{ $project->name }}</strong></h4>
            <a href="{{route('accounts', ['tab' => 'profile'])}}" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-backward "></i> {{ trans('main.address.Back') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="box">
                    <div class="box-body">
                        <table class="table center table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Engineer</th>
                                    <th>Accountant</th>
                                    <th>Purchasing Manager</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($project->customers as $index=>$customer)
                                    @if ($customer->company == 2 || $customer->company == 3 || $customer->company == 4)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if ($customer->company == 2)
                                            {{ $customer->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($customer->company == 3)
                                            {{ $customer->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($customer->company == 4)
                                            {{ $customer->name }}
                                            @endif
                                        </td>
                                        <td>@include('layouts.status', ['status' => $project->status])</td>
                                        <td>
                                            <a href="{{ route('comprojects.editStaff', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('comprojects.deleteStaff', $customer->id) }}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete">
                                                <div class="btn-group">
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</section>
@endsection


{{-- <section class="container content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="pull-left">Project: <strong>{{ $project->name }}</strong></h4>
                    <a href="{{route('accounts', ['tab' => 'profile'])}}" class="btn btn-primary btn-sm pull-right">
                        <i class="fa fa-backward "></i> {{ trans('main.address.Back') }}</a>
                </div>
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                @foreach ($project->customers as $customer)
                                    @if($customer->company == 2)
                                        <td>
                                            <h5>Engineer: <strong>{{ $customer->name }}</strong></h5>
                                            <form action="{{ route('comprojects.deleteStaff', $customer->id) }}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <div class="btn-group">
                                                    <a href="{{ route('comprojects.editStaff', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif

                                    @if($customer->company == 3)
                                        <td>
                                            <h5>Accountant: <strong>{{ $customer->name }}</strong></h5>
                                            <form action="{{ route('comprojects.deleteStaff', $customer->id) }}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <div class="btn-group">
                                                    <a href="{{ route('comprojects.editStaff', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif

                                    @if($customer->company == 4)
                                        <td>
                                            <h5>Purchasing Manager: <strong>{{ $customer->name }}</strong></h5>
                                            <form action="{{ route('comprojects.deleteStaff', $customer->id) }}" method="post" class="form-horizontal">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <div class="btn-group">
                                                    <a href="{{ route('comprojects.editStaff', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>                    
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection --}}