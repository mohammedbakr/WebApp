@if(!$reviews->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Customer Name</td>
            <td>Product Name</td>
            <td>Review</td>
            <td>Approve</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>
                    <a href="{{ route('admin.customers.show', $review->customer->id) }}">{{ $review->customer->name }}</a>
                </td>
                <td>
                    <a href="{{ route('admin.products.show', $review->product->id) }}">{{ $review->product->name }}</a></td>
                <td>{{ $review->comment }}</td>
                <td>
                    <form action="{{ route('admin.reviews.approval') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="checkbox" name="status" @if ($review->status == 1)
                            checked="checked"
                        @endif>
                        <input type="hidden" name="reviewId" value="{{ $review->id }}">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif