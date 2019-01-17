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
          ['fecha','monto'],
          @foreach($vpd as $vxd)
            ['{{ $vxd->fecha}}',{{$vxd->monto}}],
          @endforeach
        ]);

        var options = {

          title: 'total ventas ultimos 30 días',
          curveType: 'function',
          legend: { position: 'bottom' }

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>



     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['fecha','monto'],
          @foreach($vd as $vdd)
            ['{{ $vdd->fecha}}',{{$vdd->monto}}],
          @endforeach
        ]);

        var options = {
          title: 'ventas del día',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart 2'));

        chart.draw(data, options);
      }
    </script>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['fecha','cantida vendida'],
          @foreach($CatProd as $cp)
            ['{{ $cp->fecha}}',{{$cp->Ventas}}],
          @endforeach
        ]);

        var options = {
          title: 'cantidad de productos vendidos en el periodo',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart 3'));

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

        
       
        <h1>5 Productos más vendidos</h1>

        <table class="table table-sm table-hover" BORDER=5>
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          @foreach($top as $top5)
            <td>{{ $top5->nombre}}</td>
            <td>{{$top5->num_prod}}</td>
          </tr>
           @endforeach
         </table>
         @foreach($total as $total)
         <h1>Total vendido a la fecha ${{ $total->total_vendido}}
            
         </h1>
          @endforeach
      </div>

  </div>     
     

  </body>
  <body>

    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="curve_chart 2" style="width: 900px; height: 500px"></div>
     <div id="curve_chart 3" style="width: 900px; height: 500px"></div>






  </body>

</html>


 <html>

@endsection
