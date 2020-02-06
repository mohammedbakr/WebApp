@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="category"/>
    @if (app()->getLocale() == 'ar')
    <meta property="og:title" content="{{ $category->name_ar }}"/>
    <meta property="og:description" content="{{ $category->description_ar }}"/>
    @else
    <meta property="og:title" content="{{ $category->name }}"/>
    <meta property="og:description" content="{{ $category->description }}"/>
    @endif
    @if(!is_null($category->cover))
        <meta property="og:image" content="{{ asset("storage/$category->cover") }}"/>
    @endif
@endsection

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="category-top col-md-12">
                @if (app()->getLocale() == 'ar')
                <h2>{{ $category->name_ar }}</h2>
                {!! $category->description_ar !!}
                @else
                <h2>{{ $category->name }}</h2>
                {!! $category->description !!}
                @endif
            </div>
        </div>
        <hr>
        <div class="col-md-3">
            @include('front.categories.sidebar-category')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="category-image">
                    @if(isset($category->cover))
                        <img src="{{ asset("storage/$category->cover") }}" alt="{{ $category->name }}" class="img-responsive" />
                    @else
                        <img src="https://placehold.it/1200x200" alt="{{ $category->cover }}" class="img-responsive" />
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                @include('front.products.product-list', ['products' => $products])
            </div>
        </div>
    </div>
@endsection
