@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="product"/>
    @if (app()->getLocale() == 'ar')
    <meta property="og:title" content="{{ $product->name_ar }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description_ar) }}"/>
    @else
    <meta property="og:title" content="{{ $product->name }}"/>
    <meta property="og:description" content="{{ strip_tags($product->description) }}"/>
    @endif
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
                    @if (app()->getLocale() == 'ar')
                    @if(isset($category))
                    <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name_ar }}</a></li>
                    @endif
                    @else
                    @if(isset($category))
                    <li><a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a></li>
                    @endif
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
               <div class="panel panel-default">
                   <div class="panel-body">
                        <h3>{{trans('main.product.Make a Review')}}</h3>
                        <form action="{{ route('front.review.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="customer_id" value="{{ Auth::id() }}">                    
                            <div class="form-group">
                                {{trans('main.product.Rating')}}: 
                                <select name="rating" id="rating" style="width:10%;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="{{trans('main.product.Leave Your Comment')}}..."></textarea>
                            </div>
                            <input type="submit" class="btn btn-warning" value="Add Review">
                        </form>
                   </div>
               </div>
            </div>
        </div>
        @endif
        <br>
        <hr style="border-top: 1px solid #DDD;">
        <br>
        <div class="container">
            <h2>{{trans('main.product.Custumer reviews')}}</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if ($product->reviews->count())
                            <h3 id="reviews"><span>(</span>{{$product->reviews->count()}}<span>)</span> {{trans('main.product.Reviews')}}</h3>
                            @endif
                            <ul>
                            @foreach ($product->reviews as $review)
                            @if (!$review->status == 0)
                            <div class="panel panel-default">
                                <div class="panel-body" style="background-color:#f5f5f5;">
                                    {{trans('main.product.Rating')}}: <span class="text-muted badge"><strong>{{$review->rating}}</strong></span>
                                <br>
                                {{trans('main.front.By')}}: <h4 style="display:inline;">{{$review->customer->name}}</h4>
                                <div style="display:inline;"><span>&nbsp;{{trans('main.front.On')}}:</span> {{$review->created_at->format('M d, Y  h:ia')}}</div>
                                <br>
                                {{trans('main.product.Review')}}: <p style="display:inline;">{{$review->comment}}</p>
                                </div>
                            </div>
                            </li>
                            @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection