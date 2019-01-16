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
      @if(Auth::user()->isAdmin())
      <div class="col-md-2">
        <a class="btn btn-danger" href="{{route('crearProveedor')}}">Crear Proveedor <i class="fas fa-plus-square"></i></a>
      </div>
      @endif
  </div>

  <div class="">
      <div class="table-responsive">
        <table id="tablaProveedores" class="table table-sm table-hover" >
          <thead>
            <tr>
              <th onclick="sortTable(0)">Nombre</th>
              <th onclick="sortTable(1)">Direccion</th>
              <th onclick="sortTable(2)">Representante</th>
              <th>Telefono</th>
              <th onclick="sortTable(4)">Email</th>
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

@section('javascript')
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tablaProveedores");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

@endsection