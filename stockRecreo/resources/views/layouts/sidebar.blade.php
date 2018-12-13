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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<body>
  <div class="sidebar-sticky">

  <aside class="col-md-3 blog-sidebar">
    <div class="sidebar-header">
      <h3>Bootstrap Sidebar</h3>
    </div>
    <div class="p-3">
      <ol class="list-unstyled mb-0">
        <li><a href="/home" >Home</a></li>
        <li><a href="{{ route('BDproductos') }}" class="btn btn-primary">Base de datos Productos</a></li>
        <li>

        </li>
      </ol>
    </div>
  </div>

  </aside>

</body>
