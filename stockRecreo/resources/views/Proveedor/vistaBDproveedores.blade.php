@extends('layouts.ppa')

@section('content')
<div class="container">

  <div class="row">
      <div class="col">
        <div class="row">
          <form class="form-inline" action="{{route('BusquedaProveedor')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group mx-sm-3 mb-2">
              <label for="busqueda" class="sr-only">Buscar proveedor</label>
              <input type="search" class="form-control" id="busqueda" placeholder="Nombre" name="busqueda">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
          </form>
        </div>
      </div>
      <div class="col-md-2">
        <a class="btn btn-danger" href="{{route('crearProveedor')}}">Crear Proveedor <i class="fas fa-plus-square"></i></a>
      </div>      
  </div>

  <div class="">
      <div class="table-responsive">
        <table class="table table-sm table-hover" >
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Representante</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Editar</th>
              <th>Borrar</th>
            </tr>
          </thead>
          @foreach($prov as $Proveedor)
          <tr>
            <td>{{$Proveedor->nombre}}</td>
            <td>{{ $Proveedor->direccion}}</td>
            <td>{{ $Proveedor->representante}}</td>
            <td>{{ $Proveedor->telefono}}</td>
            <td>{{ $Proveedor->email }}</td>
            <td>
              <form action="{{route('editarProveedor')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='idProducto' value="{{$Proveedor->id}}">
                 <button type="submit" name="edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
              </form>
            </td>
            
            <td>
              <form action="{{route('borrarProveedor')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name='idProveedor' value="{{$Proveedor->id}}">
                 <button type="submit" name="edit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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
