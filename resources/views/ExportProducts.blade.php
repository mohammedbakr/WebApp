<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Export</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Sku</th>
                    <th>Name</th>
                    <th>الاسم</th>
                    <th>Description</th>
                    <th>الوصف</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Factory</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    @if($product->name_ar !== null)
                    <td>{{ $product->name_ar }}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif

                    <td>{{ $product->description }}</td>

                    @if($product->description_ar !== null)
                    <td>{{ $product->description_ar}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif @if($product->color !== null)
                    <td>{{ $product->color}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif @if($product->size !== null)
                    <td>{{ $product->size}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif @if($product->factory !== null)
                    <td>{{ $product->factory}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif @if($product->type !== null)
                    <td>{{ $product->type}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif  @if($product->quantity !== null)
                    <td>{{ $product->quantity}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif @if($product->price !== null)
                    <td>{{ $product->price}}</td>
                    @else
                    <td>لا يوجد</td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>