@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="content container">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($addresses)
            <div class="box">
                <div class="box-body">
                    <h2>{{trans('main.address.Address')}}</h2>
                    @if(!$addresses->isEmpty())
                        <table class="table">
                        <tbody>
                        <tr>
                            <td>{{trans('main.address.Alias')}}</td>
                            <td>{{trans('main.address.Address')}} 1</td>
                            @if(isset($address->province))
                            <td>{{trans('main.address.Province')}}</td>
                            @endif
                            <td>{{trans('main.address.State')}}</td>
                            <td>{{trans('main.address.City')}}</td>
                            <td>{{trans('main.address.Zip Code')}}</td>
                            <td>{{trans('main.address.Country')}}</td>
                            <td>{{trans('main.address.Status')}}</td>
                            <td>{{trans('main.address.Actions')}}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        @foreach ($addresses as $address)
                            <tr>
                                <td><a href="{{ route('admin.customers.show', $customer->id) }}">{{ $address->alias }}</a></td>
                                <td>{{ $address->address_1 }}</td>
                                @if(isset($address->province))
                                <td>{{ $address->province->name }}</td>
                                @endif
                                <td>{{ $address->state_code }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->zip }}</td>
                                <td>{{ $address->country->name }}</td>
                                <td>@include('layouts.status', ['status' => $address->status])</td>
                                <td>
                                    <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.addresses.edit', $address->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{trans('main.address.Edit')}}</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> {{trans('main.address.Delete')}}</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <a href="{{ route('accounts', ['tab' => 'profile']) }}" class="btn btn-default">{{trans('main.address.Back')}}</a>
                    @else
                        <p class="alert alert-warning">{{trans('main.address.No address created yet')}}. <a href="{{ route('customer.address.create', auth()->id()) }}">{{trans('main.address.Create')}}</a></p>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @else
            <div class="box">
                <div class="box-body"><p class="alert alert-warning">{{trans('main.address.No addresses found')}}.</p></div>
            </div>
        @endif
    </section>
    <!-- /.content -->
@endsection