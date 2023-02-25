@extends('Backend.Layout.Main')
@section('title', 'Dashboard')
@section('content')

    <label for="month">Filter Bulan</label>
    <input type="month" id="month" class="form-control" value="{{ date('Y-m') }}">
    <div id="chartContainer" style="width:100%; height:400px;"></div>

@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const month = document.querySelector("#month")
            month.addEventListener('change', function() {
                process()
            })
            process()

            function process() {
                let xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{ url('dashboard/chart') }}/" + month.value, true);
                xhttp.send();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        loadChart(JSON.parse(xhttp.response))
                    }
                };
            }

            function loadChart(data) {
                const chart = Highcharts.chart('chartContainer', {
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Data Pemesanan'
                    },
                    xAxis: {
                        categories: ['Pesanan Batal', 'Pesananan di Proses', 'Pesanan Selesai']
                    },
                    yAxis: {
                        title: {
                            text: month.value
                        }
                    },
                    series: [{
                        name: 'Status',
                        data: [
                            data[0][0]['total'], data[1][0]['total'], data[2][0]['total'],
                        ]
                    }, ]
                });
            }
        });
    </script>
@endsection
