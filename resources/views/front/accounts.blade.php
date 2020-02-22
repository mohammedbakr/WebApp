@extends('layouts.front.app')

@section('content')
<!-- Main content -->
<section class="container content">
    <div class="row">
        <div class="box-body">
            @include('layouts.errors-and-messages')
        </div>
        <div class="col-md-12">
            <h2> <i class="fa fa-home"></i> {{trans('main.front.My Account')}}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" @if(request()->input('tab') == 'profile') class="active" @endif><a
                            href="#profile" aria-controls="profile" role="tab"
                            data-toggle="tab">{{trans('main.front.Profile')}}</a></li>
                    <li role="presentation" @if(request()->input('tab') == 'orders') class="active" @endif><a
                            href="#orders" aria-controls="orders" role="tab"
                            data-toggle="tab">{{trans('main.order.Orders')}}</a></li>
                    <li role="presentation" @if(request()->input('tab') == 'address') class="active" @endif><a
                            href="#address" aria-controls="address" role="tab"
                            data-toggle="tab">{{trans('main.address.Address')}}</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content customer-order-list">
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'profile')active @endif"
                        id="profile">
                        @if($customer->company == 0)
                        {{$customer->name}} <br /><small>{{$customer->email}}</small>
                        @else
                        @if($customer->identity_card)
                        <div class="box">
                            <div class="box-body">
                                <h2>Projects</h2>
                                <table class="table center table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project Name</th>
                                            <th>Budget</th>
                                            <th>Accountant</th>
                                            <th>Engineer</th>
                                            <th>Purchasing Manager</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ($customer->projects as $project)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                 <td>{{ $project->name }}</td>
                                                <td >{{ $project->budget }}</td>
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
                                            <td>@include('layouts.status', ['status' => $project->status])</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        @else
                        <p>One step ahead to complete registeration, u must upload some files!</p>
                        <a href="{{route('accounts.edit', $customer->id)}}">Continue registeration</a>
                        @endif
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'orders')active @endif"
                        id="orders">
                        @if(!$orders->isEmpty())
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>{{trans('main.order.Date')}}</td>
                                    <td>{{trans('main.cart.Total')}}</td>
                                    <td>{{trans('main.address.Status')}}</td>
                                    <td>{{trans('main.order.Cancel Order')}}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                @if($order['status']->color !== 'yellow' && $order['status']->color !== 'red')
                                <tr>
                                    <td>
                                        <a data-toggle="modal" data-target="#order_modal_{{$order['id']}}"
                                            title="Show order"
                                            href="javascript: void(0)">{{ date('M d, Y h:i a', strtotime($order['created_at'])) }}</a>
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="order_modal_{{$order['id']}}" tabindex="-1"
                                            role="dialog" aria-labelledby="MyOrders">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">
                                                            {{trans('main.order.Reference')}} #{{$order['reference']}}
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <th>{{trans('main.order.Address')}}</th>
                                                                <th>{{trans('main.order.Payment Method')}}</th>
                                                                <th>{{trans('main.cart.Total')}}</th>
                                                                <th>{{trans('main.address.Status')}}</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <address>
                                                                            <strong>{{$order['address']->alias}}</strong><br />
                                                                            {{$order['address']->address_1}}
                                                                            {{$order['address']->address_2}}<br>
                                                                        </address>
                                                                    </td>
                                                                    <td>{{$order['payment']}}</td>
                                                                    <td>{{ config('cart.currency_symbol') }}
                                                                        {{$order['total']}}</td>
                                                                    <td>
                                                                        <p class="text-center"
                                                                            style="color: #ffffff; background-color: {{ $order['status']->color }}">
                                                                            {{ $order['status']->name }}</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <p>{{trans('main.order.Order details')}}:</p>
                                                        <table class="table">
                                                            <th>{{trans('main.product.Name')}}</th>
                                                            <th>{{trans('main.order.Quantity')}}</th>
                                                            <th>{{trans('main.cart.Price')}}</th>
                                                            <th>{{trans('main.cart.Cover')}}</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order['products'] as $product)
                                                                <tr>
                                                                    @if (app()->getLocale() == 'ar')
                                                                    <td>{{$product['name_ar']}}</td>
                                                                    @else
                                                                    <td>{{$product['name']}}</td> 
                                                                    @endif
                                                                    <td>{{$product['pivot']['quantity']}}</td>
                                                                    <td>{{$product['price']}}</td>
                                                                    <td><img src="{{ asset("storage/".$product['cover']) }}"
                                                                            width=50px height=50px
                                                                            alt="{{ $product['name'] }}"
                                                                            class="img-orderDetail"></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">{{trans('main.front.Close')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span
                                            class="label @if($order['total'] != $order['total_paid']) label-danger @else label-success @endif">{{ config('cart.currency') }}
                                            {{ $order['total'] }}</span></td>
                                    <td>
                                        <p class="text-center"
                                            style="color: #ffffff; background-color: {{ $order['status']->color }}">
                                            {{ $order['status']->name }}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('cancelorder.edit', $order['id'])}}">{{trans('main.order.Cancel Order')}}</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                        @else
                        <p class="alert alert-warning">{{trans('main.order.No orders yet')}}. <a
                                href="{{ route('home') }}">{{trans('main.cart.Shop now')}}!</a></p>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'address')active @endif"
                        id="address">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('customer.address.create', auth()->user()->id) }}"
                                    class="btn btn-primary">{{trans('main.address.Create your address')}}</a>
                            </div>
                        </div>
                        @if(!$addresses->isEmpty())
                        <table class="table">
                            <thead>
                                <th>{{trans('main.address.Alias')}}</th>
                                <th>{{trans('main.address.Address')}} 1</th>
                                <th>{{trans('main.address.Address')}} 2</th>
                                {{-- <th>{{trans('main.address.City')}}</th> --}}
                                {{-- @if(isset($address->province)) --}}
                                {{-- <th>{{trans('main.address.Province')}}</th> --}}
                                {{-- @endif --}}
                                {{-- <th>{{trans('main.address.State')}}</th> --}}
                                <th>{{trans('main.address.Country')}}</th>
                                <th>{{trans('main.address.Zip Code')}}</th>
                                <th>{{trans('main.address.Your Phone')}}</th>
                                <th>{{trans('main.address.Actions')}}</th>
                            </thead>
                            <tbody>
                                @foreach($addresses as $address)
                                <tr>
                                    <td>{{$address->alias}}</td>
                                    <td>{{$address->address_1}}</td>
                                    <td>{{$address->address_2}}</td>
                                    {{-- <td>{{$address->city}}</td> --}}
                                    {{-- @if(isset($address->province)) --}}
                                    {{-- <td>{{$address->province->name}}</td> --}}
                                    {{-- @endif --}}
                                    {{-- <td>{{$address->state_code}}</td> --}}
                                    <td>{{$address->country->name}}</td>
                                    <td>{{$address->zip}}</td>
                                    <td>{{$address->phone}}</td>
                                    <td>
                                        <form method="post"
                                            action="{{ route('customer.address.destroy', [auth()->user()->id, $address->id]) }}"
                                            class="form-horizontal">
                                            <div class="btn-group">
                                                <input type="hidden" name="_method" value="delete">
                                                {{ csrf_field() }}
                                                <a href="{{ route('customer.address.edit', [auth()->user()->id, $address->id]) }}"
                                                    class="btn btn-primary"> <i class="fa fa-pencil"></i>
                                                    {{trans('main.address.Edit')}}</a>
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger"> <i class="fa fa-trash"></i>
                                                    {{trans('main.address.Delete')}}</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <br />
                        <p class="alert alert-warning">{{trans('main.address.No address created yet')}}.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection