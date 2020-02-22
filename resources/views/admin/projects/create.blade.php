@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.projects.store') }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="budget">Budget <span class="text-danger">*</span></label>
                        <input type="text" name="budget" id="budget" placeholder="Budget $" class="form-control" value="{{ old('budget')}}">
                    </div>

                    <div class="form-group">
                        <label for="company">Company <span class="text-danger">*</span></label>
                        <select name="coc_id" id="coc_id" class="form-control">
                            
                            @foreach($customers as $customer)
                            @if($customer->company == 1)
                                <option value="{{$customer->id}}" selected="selected"> {{$customer->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    </div>


                {{--<div class="form-group">--}}
                    {{--<label for="accountant">Accountant <span class="text-danger">*</span></label>--}}
                    {{--<select name="accountant" id="accountant" class="form-control">--}}

                        {{--@foreach($employeesList as $emplist)--}}
                            {{--@foreach($emplist->types as $type)--}}
                                {{--@if($type->pivot->type_id == '3')--}}
                                    {{--<option  value="{{$emplist->id}}" > {{$emplist->name}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--@endforeach--}}


                    {{--</select>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label for="engineer">Engineer <span class="text-danger">*</span></label>--}}
                    {{--<select name="engineer" id="engineer" class="form-control">--}}

                        {{--@foreach($employeesList as $emplist)--}}
                            {{--@foreach($emplist->types as $type)--}}
                                {{--@if($type->pivot->type_id == '2')--}}
                                    {{--<option value="{{$emplist->id}}" > {{$emplist->name}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label for="PurchasingManager">Purchasing Manager <span class="text-danger">*</span></label>--}}
                    {{--<select name="PurchasingManager" id="PurchasingManager" class="form-control">--}}

                        {{--@foreach($employeesList as $emplist)--}}
                            {{--@foreach($emplist->types as $type)--}}
                                {{--@if($type->pivot->type_id == '4')--}}
                                    {{--<option value="{{$emplist->id}}" > {{$emplist->name}}</option>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}


            @include('admin.shared.status-select', ['status' => 0])
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <div class="btn-group">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-default">Back</a>
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
