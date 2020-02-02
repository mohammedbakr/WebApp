@extends('layouts.front.app')

@section('content')
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="alert alert-warning">{{trans('main.order.You have cancelled your order. Maybe you want to')}} <a href="{{ route('home') }}">{{trans('main.order.Show more')}}!</a></p>
            </div>
        </div>
    </div>
@endsection