@extends('layouts.base')

@section('content')
    <h1>
        Statistik
    </h1>
    <hr>

     <?php print_r ($countPemakaian); ?>
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
        });


        var chart = new google.visualization.AreaChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
        </script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/statistik.js') }}"></script>
    
@endsection

