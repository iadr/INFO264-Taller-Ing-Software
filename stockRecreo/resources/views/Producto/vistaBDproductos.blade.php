@extends('layouts.ppa')

@section('content')
<div class="container">

  <div class="row">
      <div class="col">
        <div class="row">
          <form class="form-inline" action="{{route('Busqueda')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group mx-sm-3 mb-2">
              <label for="busqueda" class="sr-only">Buscar productos</label>
              <input type="search" class="form-control" id="busqueda" placeholder="Nombre" name="busqueda">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
          </form>
          <button id="BusquedaAvanzada" class="btn btn-sm btn-link mb-2" type="button" data-toggle="collapse" data-target="#collapseBusquedaAvanzada" aria-expanded="false" aria-controls="collapseBusquedaAvanzada">Búsqueda Avanzada
          </button>
        </div>
      </div>
      @if(Auth::user()->isAdmin())
      <div class="col-md-2">
        <a class="btn btn-danger" href="{{route('crearProducto')}}">Crear Producto <i class="fas fa-plus-square"></i></a>
      </div>
      @endif
      <div class="col-md-3">
          <a href="{{route('desplegarCarro')}}" class="btn btn-primary btn-success ml-auto">
            <i class="fas fa-shopping-cart"></i> Carro de Compras
            <span class="badge badge-pill badge-light">{{Cart::count()}}</span>
          </a>
      </div>
  </div>

  <div class="collapse" id="collapseBusquedaAvanzada">
      <div class="card card-body" >
        <form action="{{route('BusquedaAvanzada')}}" method="POST">
          {{csrf_field()}}
          <div class="form-row">
            <div class="input-group input-group-sm col-md-2 mb-2">
              <label for="codigo" class="sr-only">Codigo</label>
              <input type="text" class="form-control" placeholder="Código" name="codigo">
            </div>
            <div class="input-group input-group-sm col-md-2 mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="number" class="form-control" min="100" max="1000000" aria-label="precio maximo" placeholder="Precio Máximo" name="precio">
            </div>
            <div class="input-group input-group-sm col-md-2 mb-2">
              <label for="busqueda" class="sr-only">Edad Mínima</label>
              <input type="number" class="form-control" min="1" max="18" placeholder="Edad Mínima" name="edadMin">
            </div>
            <div class="input-group input-group-sm col-md-2 mb-2">
              <label for="busqueda" class="sr-only">Edad Máxima</label>
              <input type="number" class="form-control" min="1" max="18" placeholder="Edad Máxima" name="edadMax">
            </div>
            <select class="custom-select custom-select-sm col-md-4 mb-2" name="categoria">
              <option value="" disable selected>Categoría</option>
              <?php
              use Illuminate\Support\Facades\DB;
              $cat = DB::table('productos')->distinct()->pluck('categoria');
              foreach ($cat as $categoria) {
                echo '<option value="'.$categoria.'">'.$categoria.' </option>';
              }
               ?>
            </select>
            <div class="col">
              <button type="submit" class="btn btn-sm btn-block  btn-secondary mb-2" name="button">Buscar</button>
            </div>
          </div>
        </form>
      </div>
  </div>

  <div class="">
      <div class="table-responsive">
        <table class="table table-sm table-hover" >
          <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Edad</th>
              <th>Precio</th>
              <th>Stock</th>
              @if(Auth::user()->isAdmin())
              <th>Editar</th>
              <th>Borrar</th>
              @endif
              <th>Vender</th>
            </tr>
          </thead>
          @foreach($prod as $producto)
          <tr>
            <td>{{ $producto->codigo}}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->categoria}}</td>
            <td>{{ $producto->edadminima}}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->stock }}</td>
            @if(Auth::user()->isAdmin())
            <td>
              <form action="{{route('editar')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='idProducto' value="{{$producto->id}}">
                <button type="submit" name="edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
              </form>
            </td>
            <td>
              <form action="{{route('borrarProducto')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='idProducto' value="{{$producto->id}}">
                 <button type="submit" name="edit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
            @endif
            <td>
              <form class="form-inline" action="{{route('agregarCarrito')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='identificador' value="{{$producto->id}}">
                <input type="hidden" name='nombre' value="{{$producto->nombre}}">
                <input type="hidden" name='precio' value="{{$producto->precio}}">
                <!-- <input type="submit" value="Buy"> -->
                <div class="input-group">
                  <input type="number" class="form-control form-control-sm" min="1" max="1000" style="width:60px;" name='cantidad' value="1">
                  <div class="input-group-append">
                    <button type="submit" name="Buy" class="btn btn-sm btn-outline-success"><i class="fas fa-cart-plus"></i></button>
                  </div>
                </div>
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
