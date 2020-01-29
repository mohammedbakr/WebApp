@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description) }}"/>
    @if(!is_null($product->cover))
        <meta property="og:image" content="{{ asset("storage/$product->cover") }}"/>
    @endif
@endsection

@section('content')
    <div class="container product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> {{trans('main.cart.Home')}}</a></li>
                    @if(isset($category))
                    <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a></li>
                    @endif
                    <li class="active">{{trans('main.product.Product')}}</li>
                </ol>
            </div>
        </div>
        @include('layouts.front.product')
        <br>
        @if (\Auth::guest())
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">{{trans('main.product.you must log in first to make a review')}}</div>
            </div>
        </div>      
        @else
        <div class="row">
            <div class="col-md-6">
                <h3>{{trans('main.Product.Make a Review')}}</h3>
                <form action="{{ route('front.review.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="customer_id" value="{{ Auth::id() }}">                    
                    <div class="form-group">
                        {{trans('main.Product.Rating')}}: 
                        <select name="rating" id="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="comment" id="comment" cols="30" rows="10" placeholder="{{trans('main.Product.Leave Your Comment')}}..."></textarea>
                    </div>
                    <input type="submit" class="btn btn-warning" value="Add Review">
                </form>
            </div>
        </div>
        @endif
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-6">
                @if ($product->reviews->count())
                <h3>{{$product->reviews->count()}} {{trans('main.Product.Votes')}}</h3>
                @endif
                <ul>
                    @foreach ($product->reviews as $review)
                    @if (!$review->status == 0)
                        <div>
                            {{trans('main.front.Customer Name')}}: <h3>{{$review->customer->name}}</h3>
                            <div>{{$review->created_at->format('M d, Y  h:ia')}}</div>
                            {{trans('main.Product.Rating')}}: <span class="text-muted">{{$review->rating}}</span>
                            <br>
                            {{trans('main.Product.Review')}}: <p>{{$review->comment}}</p>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection