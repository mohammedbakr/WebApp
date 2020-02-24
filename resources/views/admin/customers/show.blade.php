@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <h2>Customer</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-1">Name</td>
                        <td class="col-md-1">Email</td>
                        @if ($customer->company == 1)
                        <td class="col-md-1">{{$customer->projects->count()}} projects</td>
                        <td class="col-md-1">identity_card</td>
                        <td class="col-md-1">commerical_register</td>
                        <td class="col-md-1">Undertaking</td>
                        @endif
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        @if ($customer->company == 1)
                        <td>
                            @foreach ($customer->projects as $project)
                            <a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->name }}</a><br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ asset('uploads/identity_card/'. $customer->identity_card) }}" download="{{ $customer->name }}'s identity_card">{{ $customer->identity_card }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('uploads/commerical_register/'. $customer->commerical_register) }}" download="{{ $customer->name }}'s commerical_register">{{ $customer->commerical_register }}</a>
                        </td>
                        <td>
                            <a href="{{ asset('uploads/undertakings/'. $customer->undertaking) }}" download="{{ $customer->name }}'s undertaking">{{ $customer->undertaking }}</a>
                        </td>
                        @endif
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-body">
                <h2>Addresses</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="col-md-2">Alias</td>
                        <td class="col-md-2">Address 1</td>
                        <td class="col-md-2">Country</td>
                        <td class="col-md-2">Status</td>
                        <td class="col-md-4">Actions</td>
                    </tr>
                    </tbody>
                    <tbody>
                    @foreach ($addresses as $address)
                        <tr>
                            <td>{{ $address->alias }}</td>
                            <td>{{ $address->address_1 }}</td>
                            <td>{{ $address->country->name }}</td>
                            <td>@include('layouts.status', ['status' => $address->status])</td>
                            <td>
                                <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.customers.addresses.show', [$customer->id, $address->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('admin.customers.addresses.edit', [$customer->id, $address->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.customers.index', ['tab' => 'customer']) }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
