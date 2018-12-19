<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head')
<!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    @yield('css')
</head>
<body style="padding-top: 100px;padding-bottom: 50px;background: whitesmoke">
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-info">
    <a class="navbar-brand" target="_blank" href="http://www.codovel.com">CODOVEL.COM</a>
    @yield('nav')
</nav>
</body>
</html>