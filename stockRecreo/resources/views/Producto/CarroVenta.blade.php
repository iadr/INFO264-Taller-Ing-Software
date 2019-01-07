@extends('layouts.ppa')
@section('content')

<div class="container">

  <form class="form-inline ml-auto"  action="{{route('productos')}}" >
  <button type="submit"  class="btn btn-primary mb-2 btn-success ml-auto" >Atras</button>
  </form>

<table class="table">
    <thead>
        <tr>
            <th>producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
      @foreach(Cart::content() as $row)
        <tr>
          <td>
            <p>{{$row->name}}</p>
          </td>
          <td>
            <form class="form-inline" action="{{ route('editarProductoCarro') }}" method="post">
              {{csrf_field()}}
              <div class="input-group">
              <input class="form-control form-control-sm" type="number" name="cantidad" min="1" max="999" style="width:60px"  value="{{$row->qty}}">
              <input type="hidden" name="rowId" value="{{$row->rowId}}">
              <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
            </div>
            </div>
            </form>



          </td>
          <td>   ${{$row->price}}</td>
          <td>   ${{$row->subtotal}}</td>
          <td>
             <form action="{{route('eliminarProductoCarro')}}" method="POST">
               {{csrf_field()}}
              <input type="hidden" name='identificador' value="{{$row->rowId}}">
              <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Subtotal   </td>
        <td>{{Cart::subtotal()}}</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Iva   </td>
        <td>{{Cart::tax()}}</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Total   </td>
        <td>{{Cart::total()}}</td>
      </tr>
    </tfoot>
  </table>

  <div class="container">
    <div class="row">

      <form class="form-inline ml-auto"  action="{{route('cancelarVenta')}}" >
        <button type="submit"  class="btn btn-danger  ml-auto " >Cancelar Venta</button>
      </form>

      <form class="form-inline ml-auto" action="{{ route('finalizarVenta') }}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name='vendedor' value="{{Auth::user()->name}}">
        <button type="submit"  class="btn btn-primary mb-2 btn-success " >Finalizar venta</button>
      </form>
    </div>
  </div>
</div>
@endsection
