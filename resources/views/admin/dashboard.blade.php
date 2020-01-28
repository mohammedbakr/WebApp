@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                Start creating your amazing application!
            </div>
        </div>
        <div class="box box-solid">

            <div class="box-header">
                <h3 class="box-title">Sales Graph</h3>
            </div>
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        
@push('scripts')

<script>

    //line chart
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            @foreach ($sales_data as $data)
            {
                ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum}}"
            },
            @endforeach
        ],
        xkey: 'ym',
        ykeys: ['sum'],
        labels: ['Total Profit'],
        lineWidth: 2,
        hideHover: 'auto',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        gridTextFamily: 'Open Sans',
        gridTextSize: 10
    });
</script>

@endpush
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
