@extends('layouts.ppa')

@section('content')
@foreach($resultado as $res)
   
    <div class="container">
      <div class="row justify-content-center">

        <div class="card col-md-6 bg-light">
          <div class="card-body">
            <h5 class="card-title">Editar Proveedor</h5>

            <form class="needs-validation" action="{{route('GuardarEdicionProv')}}" method="POST" novalidate>
              {{csrf_field()}}
              <input type="hidden" name="idProveedor" value="{{$res->id}}">
              <div class="form-group">
                <div class="col mb-3">
                  <label for="validationCustom01">Nombre del Proveedor</label>
                  <input type="text" class="form-control" id="validationCustom01" name="nombre" value="{{$res->nombre}}" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col mb-3">
                  <label for="validationCustom02">Direccion</label>
                  <input type="text" class="form-control" id="validationCustom02" name="direccion" value="{{$res->direccion}}" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                 <div class="col mb-3">
                  <label for="validationCustom02">Representante</label>
                  <input type="text" class="form-control" id="validationCustom02" name="representante" value="{{$res->representante}}" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                 <div class="col mb-3">
                  <label for="validationCustom02">Telefono</label>
                  <input type="text" class="form-control" id="validationCustom02" name="telefono" value="{{$res->telefono}}" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                 <div class="col mb-3">
                  <label for="validationCustom02">Email</label>
                  <input type="text" class="form-control" id="validationCustom02" name="email" value="{{$res->email}}" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>

          </div>
        </div>
      <div class="col-md-1">
    </div>
  </div>
</div>


@endforeach

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
