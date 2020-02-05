@extends('layouts.front.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('cancelorder.update', $order->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <label for="order_status_id" class="hidden">Update status</label>
                <input type="text" name="total_paid" class="form-control" placeholder="Total paid" style="margin-bottom: 5px; display: none" value="{{ old('total_paid') ?? $order->total_paid }}" />
                <div class="input-group">
                    <select name="order_status_id" id="order_status_id" class="form-control select2">
                        @foreach($statuses as $status)
                        @if ($status->id == 2)
                        <option value="{{ $status->id }}">{{trans('main.order.Cancel Order')}}</option>
                        @endif
                        @endforeach
                    </select>
                    <span class="input-group-btn"><button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">{{trans('main.order.Submit')}}</button></span>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection