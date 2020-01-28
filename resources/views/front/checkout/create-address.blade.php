@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('customer.address.store', $customer->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="alias">{{trans('main.address.Alias')}} <span class="text-danger">*</span></label>
                        <input type="text" name="alias" id="alias" placeholder="{{trans('main.address.Home or Office')}}" class="form-control" value="{{ old('alias') }}">
                    </div>
                    <div class="form-group">
                        <label for="address_1">{{trans('main.address.Address')}} 1 <span class="text-danger">*</span></label>
                        <input type="text" name="address_1" id="address_1" placeholder="{{trans('main.address.Address')}} 1" class="form-control" value="{{ old('address_1') }}">
                    </div>
                    <div class="form-group">
                        <label for="address_2">{{trans('main.address.Address')}} 2 </label>
                        <input type="text" name="address_2" id="address_2" placeholder="{{trans('main.address.Address')}} 2" class="form-control" value="{{ old('address_2') }}">
                    </div>
                    <div class="form-group">
                        <label for="country_id">{{trans('main.address.Country')}} </label>
                        <select name="country_id" id="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="province_id">{{trans('main.address.Province')}} </label>
                        <select name="province_id" id="province_id" class="form-control">
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="cities" class="form-group">
                        <label for="city_id">{{trans('main.address.City')}} </label>
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zip">{{trans('main.address.Zip Code')}} </label>
                        <input type="text" name="zip" id="zip" placeholder="{{trans('main.address.Zip Code')}}" class="form-control" value="{{ old('zip') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">{{trans('main.address.Status')}} </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">{{trans('main.address.Disable')}}</option>
                            <option value="1">{{trans('main.address.Address')}}</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <input type="hidden" name="page" value="checkout">
                        <a href="{{ route('customer.address.index', $customer->id) }}" class="btn btn-default">{{trans('main.address.Back')}}</a>
                        <button type="submit" class="btn btn-primary">{{trans('main.address.Create')}}</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
