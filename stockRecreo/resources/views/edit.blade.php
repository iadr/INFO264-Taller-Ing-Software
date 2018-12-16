@extends('layouts.ppa')

@section('content')
    <ul>
      <li>id, {{$id}}</li>
      <li>codigo, {{$codigo}}</li>
      <li>nombre, {{$nombre}}</li>
      <li>categoria, {{$categoria}}</li>
      <li>precio, {{$precio}}</li>
      <li>stock, {{$stock}}</li>
    </ul>
@endsection
