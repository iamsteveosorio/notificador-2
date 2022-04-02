@extends('layouts.base')

@section('content')
<div class="row justify-content-right mb-4">
  <div class="col-md-3 offset-md-9">
    <a href="{{ route('home') }}"
      class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
      <span>
        <i class="fa fa-arrow-left"></i>
        <span>volver</span>
      </span>
    </a>
  </div>
</div>
<div class="row justify-content-center">
  @if(count($points))
  @foreach ($points as $point)
  <div class="col-md-3">
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              {{$point->name}}
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('calls.campaing',['point_id'=>$point->id,'id'=>$type_id ==1?$point->turnero()->campaing_id:$point->despacho()->campaing_id])}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>
              <span>IR</span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @else
  <div class="col-md-3">
    <div class="m-portlet p-5" id="m_portlet">
      <div class="m-portlet__head justify-content-center border-0">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title ">
            <h3 class="m-portlet__head-text text-uppercase">
              NO HAY PUNTOS DE VENTA ASOCIADOS A TU CUENTA, POR FAVOR COMUNICARSE CON EL LIDER
            </h3>
          </div>
        </div>
      </div>
    </div>

  </div>
  @endif
</div>
@endsection
