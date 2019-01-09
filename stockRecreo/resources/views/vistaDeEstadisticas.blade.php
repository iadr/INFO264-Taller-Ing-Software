@extends('layouts.ppa')

@section('content')


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['nombre','stock'],
          @foreach($g as $gs)
            ['{{ $gs->nombre}}',{{$gs->stock}}],
          @endforeach
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['nombre','stock'],
          @foreach($g as $gs)
            ['{{ $gs->nombre}}',{{$gs->stock}}],
          @endforeach
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="col mb-3">
      <label for="bday">Desde:</label>
      <input type="date" id="aday" name="aday">
   
   
      <label for="bday">Hasta:</label>
      <input type="date" id="bday" name="bday">

      

    </div>

              
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>


 <html>
 
@endsection