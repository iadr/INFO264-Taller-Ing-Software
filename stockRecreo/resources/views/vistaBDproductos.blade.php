@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--
                <div class="card-header">Base de datos</div>
                -->

                <div class="container">

                    <table style="width:100%" >
                        <tr>
                                <th>Nombre del producto</th>
                                <th>Precio</th> 
                                <th>Stock</th>
                        </tr>
                        
                            @foreach($productos as $producto)
                            <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->stock }}</td>
                            </tr>
                            @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
