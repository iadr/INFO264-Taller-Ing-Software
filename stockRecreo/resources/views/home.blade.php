@extends('layouts.ppa')

@section('content')
<link rel="stylesheet" href="{{asset('css/panel.css')}}">
<div class="container">



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
    <?php
    use Illuminate\Support\Facades\DB;
    $stockCritico= DB::table('productos')->where('stock','<=',2)
    ->where('activo', True)
    ->orderBy('nombre')->get();
    if(filled($stockCritico)){
      ?>
      @foreach($stockCritico as $critico)
      @if($critico->stock==0)
      <div class="alert alert-danger" role="alert">El producto {{$critico->nombre}} se ha agotado</div>
      @else
      <div class="alert alert-sm alert-warning" role="alert">Solo quedan {{$critico->stock}} unidades de {{$critico->nombre}}</div>
      @endif
      @endforeach
    <?php } ?>

</div>
@endsection
