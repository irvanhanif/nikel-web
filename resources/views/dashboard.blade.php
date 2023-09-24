@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div id="container"></div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var userData = <?php echo json_encode($vehicleUse)?>;
        var monthData = <?php echo json_encode($month)?>;
        Highcharts.chart('container', {
        title: {
            text: 'Riwayat Peminjaman Kendaraan {{ date('Y') }}'
        },
        xAxis: {
            categories: monthData
        },
        yAxis: {
            title: {
                text: 'Total Peminjam'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Peminjam Terbaru',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    </script>
@endpush
