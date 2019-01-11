@extends('layouts.ppa')

@section('content')
<link rel="stylesheet" href="{{asset('css/panel.css')}}">
<div class="container">

    <!-- <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in {{Auth::user()->name}}!
                </div>
            </div>
        </div>
    </div> -->
      <div class="row justify-content-end">
        <p>
        <button class="btn btn-sm btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        ¿Aburrido?
        </button>
        </p>
      </div>
      <div class="row justify-content-center align-items-center">
        <div class="collapse " id="collapseExample">
          <div class="card card-body justify-content-center align-items-center">
            <script src="https://cdn.htmlgames.com/embed.js?game=ClassicSolitaire&amp;width=800&amp;height=480&amp;bgcolor=white"></script>
          </div>
        </div>
    </div>

</div>
@endsection
