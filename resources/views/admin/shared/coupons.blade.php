@if(!$coupons->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Code</td>
            <td>Type</td>
            <td>Value</td>
            <td>Percent_off</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>
                    <a href="{{ route('admin.coupons.show', $coupon->id) }}">{{ $coupon->name }}</a>
                </td>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->type }}</td>
                <td>{{ $coupon->value }}</td>
                <td>{{ $coupon->percent_off }}</td>
                <td>@include('layouts.status', ['status' => $coupon->status])</td>
                <td>
                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif