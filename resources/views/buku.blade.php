@extends('template.home') 

@section('title')
<title>Home Buku</title>
@endsection

@section('container')
<?php
    //echo $buku;
?>

<div class="jumbotron jumbotron-fluid" style="background-image: url('img/buku.jpg');">
    <div class="container" style="background-color: rgb(255, 255, 255, 0.7); padding:20px; text-align:center">
        <p class="lead" style="font-family: 'Fredoka One', cursive;">UAS Kapita Selekta</p>
        <h1 class="display-5" style="font-family: 'Fredoka One', cursive;">Data Buku</h1>
        <p class="lead" style="font-family: 'Fredoka One', cursive;">Sumber : www.periplus.com</p>
    </div>
</div>

<div class="container" style="background-color: white; border-radius: 30px; padding: 20px;">
    <div class="row" style="margin: 50px 0px;">
        <h3 style="width:100%; text-align:center; font-family: 'Baloo Bhaijaan 2', cursive;">Visualisasi Data Buku New Arrival dan Best Seller</h3>
    </div>

    <div class="row" style="margin: 0px 50px; font-family: 'Dosis', sans-serif;">
        <p style="font-size: 20px">Penulis yang paling banyak menulis buku 'New Arrival' : <b>{{ $penulis_na->PENULIS }} ({{ $penulis_na->total }} buku)</b></p>
    </div>
    <div class="row"style="margin: 0px 50px; font-family: 'Dosis', sans-serif;">
        <p style="font-size: 20px">Penulis yang paling banyak menulis buku 'Best Seller' : <b>{{ $penulis_bs->PENULIS }} ({{ $penulis_bs->total }} buku)</b></p>
    </div>

    <div class="row" style="width: 100%">
        <div style="width:100%; height:300px" id="NAHisChart"></div>
        <div style="width:100%; height:300px" id="BSHisChart"></div>

        <div style="width:100%" id="pie"></div>

        <div style="width:100%" id="bar1"></div>
        <div style="width:100%" id="pie1"></div>
        <div style="width:100%" id="histo1"></div>
        <div style="width:100%" id="pie2"></div>
    </div>

    <div class="row"><p></p></div>

    <div class="row" style="width: 100%">
        <div style="width:50%; height:500px" id="NAPieChart"></div>
        <div style="width:50%; height:500px" id="BSPieChart"></div>
    </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 50px; text-align: center; font-family: 'Dosis', sans-serif; font-size: 20px; width: 100%">
    <p><b>Anggota Kelompok :</b></p>
    <p>Natasya Liemena / 311910012</p>
    <p>Teresa Octaviani / 311910013</p>
    <p>Karisna Rachmazaki / 311910017</p>
    <p>Agnes Giovanni Alianto / 311910027</p>
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // //Menggambar Column Chart Range Harga Buku New Arrivals
        // result=JSON.parse('<?php echo $buku;?>');
        // console.log(result);

        // var data = new google.visualization.DataTable();
        // array_range_harga = []

        // $.each(result, function(i, obj) {
        //     array_range_harga.push([obj['Range'], parseInt(obj['Count'])]);
        // });

        // console.log(array_range_harga);

        // data.addColumn('string', 'Range');
        // data.addColumn('number', 'Jumlah');

        // data.addRows(array_range_harga);

        // var options = {
        //     title: 'RATE HARGA BUKU NEW ARRIVALS',
        //     bar: {gap:0}
        // };

        // var chart = new google.visualization.ColumnChart(document.getElementById('NAColChart'));
        // chart.draw(data, options);

        // //Menggambar Column Chart Range Harga Buku Best Seller
        // result=JSON.parse('<?php echo $best;?>');
        // console.log(result);
        // var data = new google.visualization.DataTable();
        // array_range_harga = []

        // $.each(result, function(i, obj) {
        //     array_range_harga.push([obj['Range'], parseInt(obj['Count'])]);
        // });

        // console.log(array_range_harga);

        // data.addColumn('string', 'Range');
        // data.addColumn('number', 'Jumlah');

        // data.addRows(array_range_harga);

        // var options = {
        //     title: 'RATE HARGA BUKU BEST SELLER',
        //     bar: {gap:0}
        // };

        // var chart = new google.visualization.ColumnChart(document.getElementById('BSColChart'));
        // chart.draw(data, options);

        // array=[]
        // result=JSON.parse('<?php echo $buku;?>');

        // // $.each(result, function(i, obj) {
        // //     if (b['HARGA'] > 15000000) {
        // //         continue;
        // //     }
        // //     array.push([obj['ID'], parseInt(obj['HARGA'])]);
        // // });
        // console.log(result)
        // foreach (result as b) {
        //     console.log(b)
        //     if (b['HARGA'] > 15000000) {
        //         console.log(int(b['HARGA']));
        //         continue;
        //     }
        //     array.push([b['ID'], b['HARGA']]);
        // }

        // console.log(array)

        // var data = new google.visualization.DataTable();

        // data.addColumn('string', 'Total');
        // data.addColumn('number', 'Harga');

        // data.addRows(array);

        // var options = {
        //     title: 'RATE HARGA',
        //     // hAxis: {ticks: [200000, 400000, 600000, 800000, 1000000]}
        //     histogram : {minValue: 0, maxValue: 1000000}
        // };

        // var chart = new google.visualization.Histogram(document.getElementById('NAColChart'));

        // chart.draw(data, options);

        //Menggambar histogram Harga Buku New Arrival
        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($buku as $b)
                ['{{ $b->JUDUL }}', '{{ $b->HARGA }}'],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA BUKU NEW ARRIVAL'
        };

        var chart = new google.visualization.Histogram(document.getElementById('NAHisChart'));

        chart.draw(data, options);

        //Menggambar histogram Harga Buku Best Seller
        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($best as $b)
                ['{{ $b->JUDUL }}', '{{ $b->HARGA }}'],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA BUKU BEST SELLER'
        };

        var chart = new google.visualization.Histogram(document.getElementById('BSHisChart'));

        chart.draw(data, options);

        //Menggambar Pie Chart Cover Buku New Arrivals
        var data = google.visualization.arrayToDataTable([
            ['Cover', 'Jumlah'],
            @foreach ($buku1 as $b)
                ['{{ $b->COVER  }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'JENIS COVER BUKU NEW ARRIVALS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('NAPieChart'));
        chart.draw(data, options);

        //Menggambar Pie Chart Cover Buku Best Seller
        var data = google.visualization.arrayToDataTable([
            ['Cover', 'Jumlah'],
            @foreach ($bestss as $b)
                ['{{ $b->COVER  }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'JENIS COVER BUKU BEST SELLER'
        };

        var chart = new google.visualization.PieChart(document.getElementById('BSPieChart'));
        chart.draw(data, options);
    }
</script>
{{-- <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($buku as $b)
                ['{{ $b->HARGA }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<!-- bar -->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['COVER', 'JUDUL'],
            @foreach ($buku1 as $b)
                ['{{ $b->COVER  }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'COVER BUKU'
        };

        var chart = new google.visualization.Histogram(document.getElementById('histo'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['COVER', 'JUDUL'],
            @foreach ($buku1 as $b)
                ['{{ $b->COVER }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'COVER BUKU'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie'));
        chart.draw(data, options);
    }
</script>


</div>
<!-- donut -->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($best as $b)
                ['{{ $b->HARGA }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA',
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut1'));
        chart.draw(data, options);
    }
</script>
<!-- bar -->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($best as $b)
                ['{{ $b->HARGA  }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA'
        };

        var chart = new google.visualization.Histogram(document.getElementById('bar1'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['HARGA', 'JUDUL'],
            @foreach ($best as $b)
                ['{{ $b->HARGA }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'RATE HARGA'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie1'));

        chart.draw(data, options);
    }
</script>

<!-- bar -->
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['COVER', 'JUDUL'],
            @foreach ($bestss as $b)
                ['{{ $b->COVER  }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'COVER BUKU'
        };

        var chart = new google.visualization.Histogram(document.getElementById('histo1'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['COVER', 'JUDUL'],
            @foreach ($bestss as $b)
                ['{{ $b->COVER }}', {{ json_encode($b->total) }}],
            @endforeach
        ]);

        var options = {
            title: 'COVER BUKU'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie2'));
        chart.draw(data, options);
    }
</script> --}}

@endsection