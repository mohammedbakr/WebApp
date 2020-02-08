@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($projects)

            <div class="box">
                <div class="box-body">

                    <h2>Projects</h2>

                    <table class="table center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Budget</th>
                                <th>Company</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                     <td>{{ $project->name }}</td>
                                    <td >{{ $project->budget }}</td>
                                    @isset($project->company->name)
                                     <td>{{ $project->company->name }}</td>
                                    @endisset


                                    <td>@include('layouts.status', ['status' => $project->status])</td>




                                    <td>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show Staff</a>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Add Staff</a>
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projects->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
