@extends('petugas_loket.layouts.layout')
@section('content_header')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Selamat Datang di SIPETER</h2>
                <h5 class="text-white op-7 mb-2">Sistem Informasi Pencatatan dan Pelaporan Terpadu Puskesmas</h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="card">
        <div class="card-header">
            <center>
                <h2>Data Kunjungan Pasien </h2>
            </center>
        </div>
        <div class="card-body">
            <div id="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="LineChart" style="display: block; height: 300px; width: 293px;" width="769" height="787" class="chartjs-render-monitor"></canvas>
        </div>
        </div>
    </div>
</div>
<script>
    var dataKunjungan = @json($data);
    var lineChart = document.getElementById('LineChart').getContext('2d');

    var myLineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ["Poli Umum", "Poli TB dan Kusta", "Poli KIA dan KB", "Poli Gizi", "UGD", "Poli ISPA", "Laboratorium"],
            datasets: [{
                label: "Kunjungan Pasiien 30 Hari Terakhir",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: 'transparent',
                fill: true,
                borderWidth: 2,
                data: dataKunjungan
            }]
        },
        options : {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels : {
                    padding: 10,
                    fontColor: '#1d7af3',
                }
            },
            tooltips: {
                bodySpacing: 4,
                mode:"nearest",
                intersect: 0,
                position:"nearest",
                xPadding:10,
                yPadding:10,
                caretPadding:10
            },
            layout:{
                padding:{left:15,right:15,top:15,bottom:15}
            }
        }
    });
</script>
@endsection
@section('content')
@endsection