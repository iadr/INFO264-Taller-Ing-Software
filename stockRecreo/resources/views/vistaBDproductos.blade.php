@extends('layouts.ppa')

@section('content')


<div class="container">


      <!-- <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="{{ route('Busqueda') }}" method="GET">
          <input class="form-control mr-sm-2" type="search" placeholder="Ingrese texto a buscar" aria-label="Search" name="busqueda" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </nav>
   -->
<div class="row">
  <form class="form-inline" action="{{route('Busqueda')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group mx-sm-3 mb-2">
      <label for="busqueda" class="sr-only">Buscar productos</label>
      <input type="search" class="form-control" id="busqueda" placeholder="Nombre" name="busqueda">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Buscar</button>

    <button class="btn btn-link mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced Search
    </button>

    <div class="collapse" id="collapseExample">
      <div class="card card-body">

      </div>
    </div>
</form>
<br>

  <div class="container">
      <div class="table-responsive">
        <table class="table table-sm table-hover" >
          <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Edit</th>
          </tr>
          @foreach($prod as $producto)
          <tr>
            <td>{{$producto->codigo}}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria}}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->stock }}</td>
            <td>
              <form action="{{route('editar')}}" method="POST">
                {{csrf_field()}}
                 <input type="hidden" name='identificador' value="{{$producto->id}}">
                 <input type="submit" value="edit">
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
  </div>
</div>
</div>


@endsection
