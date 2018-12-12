@extends('layouts.ppa')

@section('content')


<div class="container">

<div class="panel-heading">
                    
                    <nav class="navbar navbar-light bg-light">

                        
                        <form class="form-inline" action="{{ route('Busqueda') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Ingrese texto a buscar" aria-label="Search" name="busqueda" />
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </nav>

                </div>


  <div class="card">
    <div class="col-md-8 col-md-offset-1">
      <div class="row justify-content-center">
        <table style="width:100%" >
          <tr>
            <th>Nombre del producto</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
          </tr>
          @foreach($prod as $producto)
            <tr>
              <td>{{ $producto->nombre }}</td>
              <td>{{ $producto->categoria}}</td>
              <td>{{ $producto->precio }}</td>
              <td>{{ $producto->stock }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
