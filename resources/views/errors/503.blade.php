@extends('layouts._layoutBlank')

@section('content')
<div class="row justify-content-md-center mb-5">
  <div class="col-xl-4">
    <img style="width:100%;" src="./assets/app/media/img/logos/sayonara.jpg">
    <h3 class="text-center"> <strong>NUESTRO SISTEMA CAMBIO!</strong> <br> HAZ CLICK EN UNO DE LOS SIGUIENTES LINKS PARA CONTINUAR</h3>
  </div>
</div>
<div class="row mt-5 justify-content-md-center">
  <div class="col-xl-3  mt-5 text-center">
    <a href="http://horarios.sayonara.co/sayonara" class="btn m-btn--pill btn-lg btn-danger m-btn m-btn--custom m-btn--bolder m-btn--uppercase">MARCACIONES</a>
  </div>
  <div class="col-xl-3  mt-5 text-center">
    <a href="http://horarios.sayonara.co/" class="btn m-btn--pill btn-lg btn-danger m-btn m-btn--custom m-btn--bolder m-btn--uppercase">administración</a>
  </div>
</div>
@endsection
