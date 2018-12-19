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


</form>
<button id="BusquedaAvanzada" class="btn btn-sm btn-link mb-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Búsqueda Avanzada
</button>


<form class="form-inline ml-auto" action="{{route('desplegarCarro')}}" method="GET">
<button type="submit"  class="btn btn-primary mb-2 btn-success " >carro compras</button>

</form>


</div>
<div class="collapse" id="collapseExample">
    <div class="card card-body" >
      <form>
        <div class="form-row">
          <div class="input-group input-group-sm col-md-3 mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input type="number" class="form-control" aria-label="precio maximo" placeholder="Precio Máximo">
          </div>
          <div class="input-group input-group-sm col-md-3 mb-2">
            <label for="busqueda" class="sr-only">Edad Mínima</label>
            <input type="number" class="form-control" id="busqueda" placeholder="Edad Mínima" name="busqueda">
          </div>
          <select class="custom-select custom-select-sm col-md-4 mb-2">
            <option selected>Categoría</option>
            <option value="Cartas">Cartas</option>
            <option value="Circo">Circo</option>
            <option value="Juegos de Mesa">Juegos de Mesa</option>
            <option value="Magia">Magia</option>
          </select>
          <div class="col">
            <button type="submit" class="btn btn-sm btn-block  btn-secondary mb-2" name="button">Buscar</button>
          </div>
        </div>
      </form>
    </div>
</div>

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
            <th>Buy</th>
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
                <input type="hidden" name='idProducto' value="{{$producto->id}}">
                 <input type="submit" value="edit">
              </form>
            </td>

            <td>
              <form action="{{route('agregarCarrito')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='identificador' value="{{$producto->id}}">
                <input type="hidden" name='nombre' value="{{$producto->nombre}}">
                <input type="hidden" name='precio' value="{{$producto->precio}}">
                 <input type="submit" value="Buy">
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
