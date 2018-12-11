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

<div id="sidebar" class="col-md-3">
  <nav >
      <div class="sidebar-header">
          <h3>Bootstrap Sidebar</h3>
      </div>
      <ul class="list-unstyled components">
          <p>Dummy Heading</p>
          <li class="active">
              <a href="/home" >Home</a>

          </li>
          <li>
            <a href="{{ route('BDproductos') }}" class="btn btn-primary">Base de datos Productos</a>
              <!-- <a href="#">About</a> -->
          </li>
          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#">Portfolio</a>
          </li>
          <li>
              <a href="#">Contact</a>
          </li>
      </ul>
  </nav>
  </div>
</body>
