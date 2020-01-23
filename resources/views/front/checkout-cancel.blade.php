@extends('layouts.front.app')

@section('content')
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="alert alert-warning"><a href="{{ route('home') }}">شراء منتج اخر ! </a> تم الغاء الطلب</p>
            </div>
        </div>
    </div>
@endsection