@extends('layouts.ppa')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{Auth::user()->name}}!
                    <div class="links">

                        <!-- <a href="{{ route('BDproductos') }}" class="btn btn-primary">Base de datos Productos</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
