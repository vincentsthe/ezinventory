@extends('layouts.base')

@section('content')
    <h1>
        Statistik
    </h1>
    <hr>
    <div>
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Mulai</label>
            <div class="col-md-5">
                <input id="startdate" type="text" class="form-control" name="startdate" value="{{ $startDate }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label">Tanggal Selesai</label>
            <div class="col-md-5">
                <input id="enddate" type="text" class="form-control" name="enddate" value="{{ $endDate }}" required>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-2">
            <button class="btn btn-primary" style="float:right" type="submit">Buka</button>
        </div>
    </form>
    </div>

    <br><br>
    <div id="chart">
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'ATK');
        data.addColumn('number', 'Jumlah Pemakaian');

        <?php for($i = 0; $i < $countAtk;$i++) : ?> 
            data.addRow([<?php echo "'" . $atkList[$i]->jenis . "'" ?>,<?php echo $countPemakaian[$i] ?>]);
        <?php endfor; ?>

        var options = ({
            title: 'Total Pemakaian ATK per Periode',
            height: 450,
            width: 900,
            bar: {groupWidth: "50%"},
        });


        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
        </script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik.js') }}"></script>
    
@endsection

