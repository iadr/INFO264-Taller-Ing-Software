@extends('layouts.ppa')

@section('content')


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['productos','cantidad vendida'],
           @foreach($v as $vs)
            ['{{ $vs->nombre}}',{{$vs->num_prod}}],
          @endforeach
        ]);

        var options = {
          chart: {
            title: 'Productos mas vendidos',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['fecha','monto'],
          @foreach($gg as $gss)
            ['{{ $gss->fecha}}',{{$gss->monto}}],
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
          ['fecha','monto'],
          @foreach($gg as $ggs)
            ['{{ $ggs->fecha}}',{{$ggs->monto}}],
          @endforeach
        ]);

        var options = {
          title: 'ventas del mes',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <form class="form-inline ml-auto" action="{{ route('graf2') }}" method="POST">
        {{csrf_field()}}

      <label for="bday">Desde:</label>
      <input type="date" id="aday" name="desde" required>

      <label for="bday">Hasta:</label>
      <input type="date" id="bday" name="hasta" value="<?php echo date('Y-m-d');?>">



        <button type="submit"  class="btn btn-primary mb-2 btn-success " >Generar nuevas Estadisticas</button>
      </form>
      </div>
    </div>


      <div class="">
      <div class="table-responsive">
         @foreach($g as $gk)

         <h1>{{$gk->total_vendido}}</h1>

          @endforeach

        <h1>Productos más vendidos</h1>
        <table class="table table-sm table-hover" BORDER=5>
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          @foreach($v as $vs)
            <td>{{ $vs->nombre}}</td>
            <td>{{$vs->num_prod}}</td>
          </tr>
           @endforeach
         </table>
      </div>
  </div>

     <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>

</html>


 <html>

@endsection
