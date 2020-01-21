@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        <!-- Default box -->
        @if(!$reviews->isEmpty())
        <div class="box">
            <div class="box-body">
                <h2>Reviews</h2>
                @include('admin.shared.reviews')
                {{ $reviews->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
