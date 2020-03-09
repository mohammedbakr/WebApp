@extends('layouts.front.app')

@section('content')
        <div class="container product-in-cart-list">
            @if(!$cartItems->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> {{trans('main.cart.Home')}}</a></li>
                            <li class="active">{{trans('main.cart.Cart')}}</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 content">
                        <div class="box-body">
                            @include('layouts.errors-and-messages')
                        </div>
                        <h3><i class="fa fa-cart-plus"></i> {{trans('main.cart.Shopping Cart')}}</h3>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="row header hidden-xs hidden-sm"> -->
                        <div class="row hidden-xs hidden-sm" style="height: 40px;">
                            
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><b>{{trans('main.cart.Cover')}}</b></div>
                                </div>
                            </div>

                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5"><b>{{trans('main.cart.Name')}}</b></div>
                                    <div class="col-lg-2 col-md-2"><b>{{trans('main.cart.Quantity')}}</b></div>
                                    <div class="col-lg-1 col-md-1"><b>{{trans('main.cart.Remove')}}</b></div>
                                    <div class="col-lg-2 col-md-2"><b>{{trans('main.cart.Price')}}</b></div>
                                    <div class="col-lg-2 col-md-2"><b>{{trans('main.cart.Total')}}</b></div>
                                </div>
                            </div>

							
							
                        </div>
                        @foreach($cartItems as $cartItem)
                            <div class="row">
                                
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <a href="{{ route('front.get.product', [$cartItem->product->slug]) }}" class="hover-border">
                                                @if(isset($cartItem->cover))
                                                    <img src="{{$cartItem->cover}}" alt="{{ $cartItem->name }}" class="img-responsive img-thumbnail">
                                                @else
                                                    <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8">
                                    <div class="row">
                                        
                                        
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            @if (app()->getLocale() == 'ar')
                                            <h4 style="margin-bottom:5px;">{{ $cartItem->product->name_ar }}</h4>
                                            @else
                                            <h4 style="margin-bottom:5px;">{{ $cartItem->product->name }}</h4>
                                            @endif
                                            @if($cartItem->options->has('combination'))
                                                <div style="margin-bottom:5px;">
                                                @foreach($cartItem->options->combination as $option)
                                                    <small class="label label-primary">{{$option['value']}}</small>
                                                @endforeach
                                                </div>
                                            @endif
                                            <!-- <div class="product-description"> -->
                                                @if (app()->getLocale() == 'ar')
                                                {!! $cartItem->product->description_ar !!}
                                                @else
                                                {!! $cartItem->product->description !!}
                                                @endif
                                            <!-- </div> -->
                                        </div>
                                        
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8">
                                            <form action="{{ route('cart.update', $cartItem->rowId) }}" class="form-inline" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="put">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" value="{{ $cartItem->qty }}" class="form-control input-sm" />
                                                    <span class="input-group-btn"><button class="btn btn-default btn-sm">{{trans('main.cart.Update')}}</button></span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-8 col-xs-4"> 
                                            <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete">
                                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <span class="hidden-lg hidden-md"><small>{{trans('main.cart.Price')}}: </span>
                                            {{config('cart.currency')}} {{ number_format($cartItem->price, 2) }}</small>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <span class="hidden-lg hidden-md"><small>{{trans('main.cart.Total')}}: </span>
                                            {{config('cart.currency')}} {{ number_format(($cartItem->qty*$cartItem->price), 2) }}</small>
                                        </div>

                                    </div>
                                </div>                       
                                
                            </div>
                            <br>
                        @endforeach


                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-12 content">
                        <table class="table table-striped">
                            <tfoot>
                                <tr>
                                    <td class="bg-warning">{{trans('main.cart.Subtotal')}}</td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning">{{config('cart.currency')}} {{ number_format($subtotal, 2, '.', ',') }}</td>
                                </tr>
                                @if(isset($shippingFee) && $shippingFee != 0)
                                <tr>
                                    <td class="bg-warning">{{trans('main.cart.Shipping')}}</td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning">{{config('cart.currency')}} {{ $shippingFee }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="bg-warning">{{trans('main.cart.Tax')}}</td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning">{{config('cart.currency')}} {{ number_format($tax, 2) }}</td>
                                </tr>
                                @if(session()->has('coupon'))
                                <tr>
                                    <td class="bg-warning">{{trans('main.cart.Discount')}}:</td>
                                    <td class="bg-warning">{{session()->get('coupon')['name']}}</td>
                                    <td class="bg-warning">
                                        <form action="{{route('coupon.destroy')}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger muted">{{trans('main.cart.Remove')}}</button>
                                        </form>
                                    </td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning">-{{config('cart.currency')}} {{$discount}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="bg-warning">{{trans('main.cart.New Subtotal')}}</td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning"></td>
                                    <td class="bg-warning">{{config('cart.currency')}} {{ $newSubtotal}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-success">{{trans('main.cart.Total')}}</td>
                                    <td class="bg-success"></td>
                                    <td class="bg-success"></td>
                                    <td class="bg-success"></td>
                                    <td class="bg-success">{{config('cart.currency')}} {{ $newTotal }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        @if (!session()->has('coupon'))
                        <div class="row text-center">
                            <p>{{trans('main.cart.Have a code')}} ?</p>
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf
                                <input type="text" name="couponCode" id="couponCode" style="padding: 6px 12px; height: 100%;">
                                <button type="submit" class="btn btn-primary">{{trans('main.cart.Apply')}}</button>
                            </form>
                        </div>
                        <hr> 
                        @endif
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('home') }}" class="btn btn-default">{{trans('main.cart.Continue shopping')}}</a>
                                    <a href="{{ route('checkout.index') }}" class="btn btn-primary">{{trans('main.cart.Go to checkout')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-warning">{{trans('main.cart.No products in cart yet')}}. <a href="{{ route('home') }}">{{trans('main.cart.Shop now')}}!</a></p>
                    </div>
                </div>
            @endif
        </div>
@endsection
@section('css')
    <style type="text/css">
        .product-description {
            padding: 10px 0;
        }
        .product-description p {
            line-height: 18px;
            font-size: 14px;
        }
    </style>
@endsection