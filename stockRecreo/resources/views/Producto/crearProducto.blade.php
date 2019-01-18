@extends('layouts.ppa')

@section('content')

    <div class="container">
      <div class="row justify-content-center">

        <div class="card col-md-6 bg-light">
          <div class="card-body">
            <h5 class="card-title">Producto nuevo</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <form class="needs-validation" action="{{route('GuardarProductoNuevo')}}" method="POST" novalidate>
              {{csrf_field()}}

              <div class="form-group">
                <div class="col mb-3">
                  <label for="validationCustom01">Código del producto</label>
                  <input type="text" class="form-control" id="validationCustom01" name="codigo" value="" required>
                  <div class="invalid-feedback">
                    Por favor, ingrese el código del producto
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom01">Nombre del producto</label>
                  <input type="text" class="form-control" id="validationCustom01" name="nombre" value="" required>
                  <div class="invalid-feedback">
                    Ingrese un nombre válido
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom02">Categoría</label>
                  <select class="custom-select " id="validationCustom02" name="categoria" required>
                    <option selected value="juegos de mesa">Juegos de mesa</option>
                    <option value="cartas">Cartas</option>
                    <option value="puzzles">Puzzles</option>
                    <option value="coleccionables">Coleccionables</option>
                    <option value="didacticos">Didácticos</option>
                    <option value="magia">Magia</option>
                    <option value="circo">Circo</option>
                    <option value="exterior">Exterior</option>
                    <option value="otros">Otros</option>
                  </select>
                  <!-- <input type="text" class="form-control" id="validationCustom02" name="categoria" value="" required> -->
                  <div class="invalid-feedback">
                    Por favor, seleccione una categoría
                  </div>
                </div>
                   <div class="col mb-3">
                  <label for="validationCustom03">Edad mínima</label>
                  <input type="number" class="form-control" id="validationCustom03" min="1" max="20" name="edadminima" value="" required>
                  <div class="invalid-feedback">
                    Ingrese una edad válida
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="validationCustomUsername">Precio</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">$</span>
                    </div>
                    <input type="number" class="form-control" id="validationCustomUsername" min="100" max="999999" name="precio" value="" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Ingrese un precio válido.
                    </div>
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom03">Stock</label>
                  <input type="number" class="form-control" id="validationCustom03" min="1" max="1000" name="stock" value="" required>
                  <div class="invalid-feedback">
                    Por favor, ingrese un stock válido.
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="validationCustom04">Proveedor</label>
                  <select class="custom-select " id="validationCustom04" name="proveedor" required>
                    <option selected value="" disabled hidden>Seleccione un proveedor</option>
                    <?php
                    use Illuminate\Support\Facades\DB;
                    $proveedores=DB::table('proveedores')->select('id','nombre')->get();
                    foreach ($proveedores as $prov) {
                      echo '<option value="'.$prov->id.'">'.$prov->nombre.'</option>';
                    }
                    ?>
                  </select>
                  <div class="col-md-3">
                    <a class="btn btn-sm btn-danger" href="{{route('crearProveedor')}}">Crear proveedor</a>
                  </div>
                  <div class="invalid-feedback">

                  </div>
                </div>


                <button class="btn btn-primary" type="submit">Crear producto</button>
              </div>
            </form>

          </div>
        </div>
      <div class="col-md-1">
    </div>
  </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
