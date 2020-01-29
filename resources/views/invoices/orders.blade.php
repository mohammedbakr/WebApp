<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{trans('main.invoice.Invoice')}}</title>
    <style type="text/css">
        table { border-collapse: collapse;}
    </style>
</head>
<body>
    <section class="row">
        <div class="pull-left">
            {{trans('main.invoice.Invoice To')}}: <strong>{{$customer->name}}</strong> <br />
            {{trans('main.invoice.Deliver To')}}: <strong>{{ $address->alias }}</strong><br />
            {{ $address->address_1 }} {{ $address->address_2 }} <br />
            {{ $address->city }} {{ $address->province }} <br />
            {{ $address->country }} {{ $address->zip }}
        </div>
        <div class="pull-right">
            {{trans('main.invoice.From')}}: {{config('app.name')}}
        </div>
        <hr width="100%" color="#CCC"/>
    </section>
    <section class="row">
        <div class="col-md-12">
            <h2>{{trans('main.product.Details')}}</h2>
            <table class="table table-striped" width="100%" border="0.3" cellspacing="10" cellpadding="10" style="border:1px solid #CCC;">
                <thead style="background-color:#DDD;">
                    <tr>
                        <th>{{trans('main.product.SKU')}}</th>
                        <th>{{trans('main.product.Name')}}</th>
                        <th>{{trans('main.product.Description')}}</th>
                        <th>{{trans('main.product.Quantity')}}</th>
                        <th>{{trans('main.cart.Price')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{number_format($product->price * $product->pivot->quantity, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{trans('main.cart.Subtotal')}}:</td>
                        <td>{{$order->total_products}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{trans('main.cart.Discount')}}:</td>
                        <td>{{$order->discounts}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{trans('main.cart.Tax')}}:</td>
                        <td>{{$order->tax}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>{{trans('main.cart.Total')}}:</strong></td>
                        <td><strong>{{$order->total}}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</body>
</html>