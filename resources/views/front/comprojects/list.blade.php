@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($projects)

            <div class="box">
                <div class="box-body">

                    <h2>Projects</h2>
                    {{-- <a href="{{ route('') }}"></a> --}}

                    <table class="table center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Budget</th>
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
                                   {{-- <td>
                                       <a href="{{ route('admin.customers.show', $project->customer['id']) }}">{{$project->customer->name}}</a>
                                    </td> --}}
                                    <td>@include('layouts.status', ['status' => $project->status])</td>
                                    <td>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show Staff</a>
                                                <a href="{{ route('comprojects.createStaff', $project->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Add Staff</a>
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
