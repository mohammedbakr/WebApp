@extends('layouts.admin.app')

@section('content')
<div class="container" style="width: 100%;">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if(request()->input('tab') == 'customer') class="active" @endif><a href="#customer"
                    aria-controls="customer" role="tab" data-toggle="tab">Customer</a></li>
            <li role="presentation" @if(request()->input('tab') == 'Company') class="" @endif><a href="#Company"
                    aria-controls="Company" role="tab" data-toggle="tab">Company</a></li>
        </ul>
        <!-- Tab panes -->

        <div class="tab-content customer-order-list">
            {{-- Start customer Form --}}
            <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'customer') active @endif"
                id="customer">
                @include('layouts.errors-and-messages')
                <!-- Default box -->
                @if($customers)
                <div class="box">
                    <div class="box-body">
                        <h2>Customers</h2>
                        @include('layouts.search', ['route' => route('admin.customers.index')])
                        <table class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                @if($customer['company'] != 1)
                                <tr>
                                    <td>{{ $customer['id'] }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ $customer['email'] }}</td>
                                    <td>@include('layouts.status', ['status' => $customer['status']])</td>
                                    <td>
                                        <form action="{{ route('admin.customers.destroy', $customer['id']) }}"
                                            method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.customers.show', $customer['id']) }}"
                                                    class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                                <a href="{{ route('admin.customers.edit', $customer['id']) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                                    Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @endif

            </div>
            {{-- End customer Form --}}

            {{-- Start Company Form --}}

            <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'Company') active @endif" id="Company">

                @include('layouts.errors-and-messages')
                <!-- Default box -->
                @if($customers)
                <div class="box">
                    <div class="box-body">
                        <h2>Customers</h2>
                        @include('layouts.search', ['route' => route('admin.customers.index')])
                        <table class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                @if($customer['company'] == 1)
                                <tr>
                                    <td>{{ $customer['id'] }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ $customer['email'] }}</td>
                                    <td>@include('layouts.status', ['status' => $customer['status']])</td>
                                    <td>
                                        <form action="{{ route('admin.customers.destroy', $customer['id']) }}"
                                            method="post" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.customers.show', $customer['id']) }}"
                                                    class="btn btn-default btn-sm"><i class="fa fa-eye"></i>
                                                    Show</a>
                                                <a href="{{ route('admin.customers.edit', $customer['id']) }}"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                                    Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @endif

            </div>

            {{-- End Company Form --}}

        </div>
    </div>
</div>
@endsection