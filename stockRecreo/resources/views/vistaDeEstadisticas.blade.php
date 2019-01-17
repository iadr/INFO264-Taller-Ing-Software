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
<<<<<<< HEAD
          title: 'total ventas ultimos 30 días',
          curveType: 'function',
          legend: { position: 'bottom' }
=======
          chart: {
            title: 'Productos mas vendidos',
          }
>>>>>>> 3d042bbafb71b83b9c2afef0a42a2e80ee2ce66c
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

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['fecha', 'ventas'],
          @foreach($comparar as $comp)
            ['{{ $comp->fecha}}',{{$comp->monto}}],
          @endforeach
        ]);
        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'comparacion de ventas',
            
          bar: { groupWidth: "90%" }
        }};

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>


  </head>
  <body>

    <div class="container">
      <div class="row">
       <form class="form-inline ml-auto" action="{{ route('graf2') }}" method="POST">
        {{csrf_field()}}

      <label for="bday">Desde:</label>
<<<<<<< HEAD
      <input type="date" id="aday" name="desde" required value="<?php echo date('Y-m-d', strtotime('-30 days'));?>"> 
   
      <label for="bday">Hasta:</label>
      <input type="date" id="bday" name="hasta" value="<?php echo date('Y-m-d'); ?>">
     
=======
      <input type="date" id="aday" name="desde" required>

      <label for="bday">Hasta:</label>
      <input type="date" id="bday" name="hasta" value="<?php echo date('Y-m-d');?>">


>>>>>>> 3d042bbafb71b83b9c2afef0a42a2e80ee2ce66c

        <button type="submit"  class="btn btn-primary mb-2 btn-success " >Generar nuevas Estadisticas</button>
      </form>
      </div>
    </div>


      <div class="">
      <div class="table-responsive">
<<<<<<< HEAD
        
       
        <h1>5 Productos más vendidos</h1>
=======
         @foreach($g as $gk)

         <h1>{{$gk->total_vendido}}</h1>

          @endforeach

        <h1>Productos más vendidos</h1>
>>>>>>> 3d042bbafb71b83b9c2afef0a42a2e80ee2ce66c
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
<<<<<<< HEAD
  </div>     
     


   
=======
  </div>

     <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
>>>>>>> 3d042bbafb71b83b9c2afef0a42a2e80ee2ce66c
  </body>
  <body>

    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="curve_chart 2" style="width: 900px; height: 500px"></div>
     <div id="curve_chart 3" style="width: 900px; height: 500px"></div>
  <div id="top_x_div" style="width: 800px; height: 600px;"></div>






  </body>

</html>


 <html>

@endsection
