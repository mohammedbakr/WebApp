@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$coupons->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>coupons</h2>
                    @include('layouts.search', ['route' => route('admin.coupons.index')])
                    @include('admin.shared.coupons')
                    {{ $coupons->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
