@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-3">Customer Name</td>
                            <td class="col-md-3">Product Name</td>
                            <td class="col-md-3">Review</td>
                        </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->customer->name }}</td>
                        <td>{{ $review->product->name }}</td>
                        <td>{{ $review->comment }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
