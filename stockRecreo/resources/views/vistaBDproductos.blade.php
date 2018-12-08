@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="col-md-2"></div>
    <div class="col-md-8 center">
      <div class="row justify-content-center">
        <table style="width:100%" >
          <tr>
            <th>Nombre del producto</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
          </tr>
          @foreach($productos as $producto)
            <tr>
              <td>{{ $producto->nombre }}</td>
              <td>{{$producto->categoria}}</td>
              <td>{{ $producto->precio }}</td>
              <td>{{ $producto->stock }}</td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection
