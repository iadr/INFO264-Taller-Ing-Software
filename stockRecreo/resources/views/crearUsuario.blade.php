@extends('layouts.ppa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="card col-md-6 bg-light">
        <div class="card-body">
          <h5 class="card-title">Registrar vendedor</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <br>
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-md-4 control-label">Nombre</label>

                  <div class="col-md">
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                      @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">Email</label>

                  <div class="col-md">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">Contraseña</label>

                  <div class="col-md">
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <label for="password-confirm" class="col-md control-label">Confirmar contraseña</label>

                  <div class="col-md">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-4 col-md-offset-2">
                      <button type="submit" class="btn btn-primary">
                          Registrar
                      </button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection
