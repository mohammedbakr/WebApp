@extends('layouts.front.app')

@section('content')
    <div class="container product-in-cart-list">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p class="alert alert-success"> <a href="{{ route('home') }}">عرض المزيد</a> تم الطلب بنجاح</p>
            </div>
        </div>
    </div>
@endsection