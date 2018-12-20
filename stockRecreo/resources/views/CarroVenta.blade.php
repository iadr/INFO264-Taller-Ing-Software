@extends('layouts.ppa')
@section('content')

<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
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
<form class="form-inline ml-auto" >
<button type="submit"  class="btn btn-primary mb-2 btn-success " >Vender</button>

</form>
</div>
@endsection
