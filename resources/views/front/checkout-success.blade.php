@extends('layouts.front.app')

@section('content')
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="alert alert-success">{{trans('main.order.Your order is under way!')}} <a href="{{ route('home') }}">{{trans('main.order.Show more')}}!</a></p>
            </div>
        </div>
    </div>
@endsection