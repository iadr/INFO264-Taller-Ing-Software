<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hora del Recreo') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

        <!-- Bootstrap core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>

  <!-- <nav class="navbar navbar-light fixed-top bg-light p-0 shadow"> -->
  <nav class="navbar navbar-light fixed-top bg-light p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('/home')}}">{{ config('app.name', 'Hora del Recreo') }}</a>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <ul class="navbar-nav px-3">
      <li class="nav-item ">
        <!-- Authentication Links -->
        @guest

            <li><a href="{{ url('/') }}">Vuelta a Inicio</a></li>
            <!-- <li><a href="{{ route('login') }}">Ingresar</a></li> -->
            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
        @else

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
        @endguest
      </li>
    </ul>

  </nav>
  @auth
  @include('layouts.sidebar')
  @endauth


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
      window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Icons -->
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/charts.js')}}"></script>
</body>
</html>
