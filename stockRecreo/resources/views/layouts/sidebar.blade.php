<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    <!-- Styles -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

              <li><a href="/home" class="btn">Inicio</a></li>
              <li><a href="{{ route('productos') }}" class="btn">Administrar Productos</a></li>
              <li><a href="{{ route('proveedores') }}" class="btn">Administrar Proveedores</a></li>
              <li><a href="{{ route('graf1') }}" class="btn">Generar Estadisticas</a></li>

          </ul>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br>
        @yield('content')
      </main>
</body>
