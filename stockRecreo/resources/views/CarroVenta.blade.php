@extends('layouts.ppa')
@section('content')

<div class="container">
<table>
    <thead>
        <tr>
            <th>producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

      <?php foreach(Cart::content() as $row) :?>

          <tr>
              <td>
                  <p><strong><?php echo $row->name; ?></strong></p>
                  <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
              </td>
              <td><input type="text" value="<?php echo $row->qty; ?>"></td>
              <td>   $<?php echo $row->price; ?></td>
              <td>   $<?php echo $row->total; ?></td>
          </tr>

      <?php endforeach;?>

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
        <td><?php echo Cart::total(); ?></td>
      </tr>
    </tfoot>
</table>
<form class="form-inline ml-auto" >
<button type="submit"  class="btn btn-primary mb-2 btn-success " >Vender</button>

</form>
</div>
@endsection