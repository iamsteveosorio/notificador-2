@extends('layouts.base')

@section('content')
@if($user->role_id == 1)
<div class="row justify-content-center mt-4">
  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Gestión de usuarios
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('users')}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>
              <span>Ver usuarios</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Gestión de puntos de venta
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('pointsales')}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>
              <span>Ver puntos de venta</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>

  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Gestión de campañas
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('campaings')}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>

              <span>Ver campañas</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
</div>

@endif
<div class="row justify-content-center">
  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Servicio Turnero
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('calls',['type_id'=>1])}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>
              <span>Ver Servicio Turnero</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
  {{-- <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Servicio Despacho
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('calls',['type_id'=>2])}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>
              <span>Ver Servicio Despacho</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div> --}}

  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Consultas y Reportes
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('report')}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>

              <span>Ver Consultas y Reportes</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
  @if($user->role_id == 1 || $user->role_id == 4)
  <div class="col-md-3">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              Reporte Feedback
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <div class="row justify-content-center">
          <a href="{{route('feedback_report')}}"
            class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
            <span>

              <span>Ver Feedbacks</span>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
  @endif
</div>
@endsection
