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
              <td><input class="form-control form-control-sm" type="number" style="width:60px"  value="{{$row->qty}}"></td>
              <td>   ${{$row->price}}</td>
              <td>   ${{$row->subtotal}}</td>
              <td>
                <form >
                
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
        <td><?php echo Cart::subtotal(); ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Iva   </td>
        <td><?php echo Cart::tax(); ?></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>Total   </td>
        <td><?php
        echo Cart::total();
         ?></td>
      </tr>
    </tfoot>
  </table>

  <div class="container">
    <div class="row">

      <form class="form-inline ml-auto"  action="{{route('cancelarVenta')}}" >
        <button type="submit"  class="btn btn-danger  ml-auto " >Cancelar Venta</button>
      </form>
  
      <form class="form-inline ml-auto" >
        <button type="submit"  class="btn btn-primary mb-2 btn-success " >Vender</button>
      </form>

    </div>
  </div>
</div>
@endsection
