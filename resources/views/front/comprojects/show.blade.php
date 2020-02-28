@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Accountant</th>
                            <th>Engineer</th>
                            <th>Purchasing Manager</th>
                            <th>Actions</th>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            @foreach($project->employees as $employee)
                                @if($employee->pivot->project_id == $project->id && $employee->types[0]->type == 'Accountant' )
                                    <td>
                                        {{$employee->name}}
                                        @if($employee->status == 0 )
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" title="This user is disabled, Please choose another one">
                                                <b class="text-danger bg-danger">Disabled <i class="fa fa-exclamation-circle"></i></b>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                             @foreach($project->employees as $employee)
                                @if($employee->pivot->project_id == $project->id && $employee->types[0]->type == 'Engineer' )
                                    <td>
                                        {{$employee->name}}
                                        @if($employee->status == 0 )
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" title="This user is disabled, Please choose another one">
                                                <b class="text-danger bg-danger">Disabled <i class="fa fa-exclamation-circle"></i></b>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                             @foreach($project->employees as $employee)
                                @if($employee->pivot->project_id == $project->id && $employee->types[0]->type == 'Purchasing Manager' )
                                    <td>
                                        {{$employee->name}}
                                        @if($employee->status == 0 )
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" title="This user is disabled, Please choose another one">
                                                <b class="text-danger bg-danger">Disabled <i class="fa fa-exclamation-circle"></i></b>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>

        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
