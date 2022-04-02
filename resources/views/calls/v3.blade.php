@extends('layouts.base')

@section('content')
<div class="row justify-content-right mb-4">
  <div class="col-md-6 offset-md-3">
    <h3 class="text-center text-black"><strong>-- PUNTO DE VENTA --</strong></h3>
  </div>
  <div class="col-md-3">
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
  <div class="col-md-8">
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head justify-content-center border-0">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              INGRESAR EL NUMERO DEL CELULAR
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body pt-0">
        <div class="row justify-content-center">
          <form class="text-center" action="" method="POST">
            @csrf
            <input type="text" inputmode="numeric" class="form-control border border-dark" id="phone" name="phone"
              style="font-size: 4em; text-align: center; height: 65px;">
            <input type="submit"
              class="btn m-btn--pill btn-lg btn-danger m-btn m-btn--custom m-btn--bolder m-btn--uppercase mt-3"
              value="LLAMAR">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="m-portlet" id="m_portlet_table">
      <div class="m-portlet__head justify-content-center border-0">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              PEDIDOS
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body pt-0">
        <div id="calls-grid" class="row justify-content-center m-scrollable m-scroller ps ps--active-y"
          data-scrollbar-shown="true" data-scrollable="true" style="overflow:hidden; max-height: 300px">

          <table id="calls-table" class="table text-center">
            <thead>
              <tr>
                <th>HORA</th>
                <th>CLIENTE</th>
                <th>TELEFONO</th>
                <th colspan="2">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td>{{'05:00 PM' }}</td>
                <td>{{'PEPITO PEREZ'}}</td>
                <td>{{'30011112233'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm text-uppercase">{{'LLAMAR'}}</button>
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
              <tr class="">
                <td>{{'04:00 PM' }}</td>
                <td>{{'JUANITO GONZALEZ'}}</td>
                <td>{{'30011112233'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm text-uppercase">{{'LLAMAR'}}</button>
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
              <tr class="">
                <td>{{'03:00 PM' }}</td>
                <td>{{'MARIA MORA'}}</td>
                <td>{{'30011112233'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm text-uppercase">{{'LLAMAR'}}</button>
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="m-portlet" id="m_portlet_table">
      <div class="m-portlet__head justify-content-center border-0">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text text-uppercase">
              LLAMADAS REALIZADAS
            </h3>
          </div>
        </div>
      </div>
      <div class="m-portlet__body pt-0">
        <div class="form-group m-form__group row align-items-center">
          <div class="col-md-6">
            <div class="m-input-icon m-input-icon--left">
              <input id="keyword" name="keyword" type="text" class="form-control m-input" placeholder="BUSCAR..."
                value="">
              <span class="m-input-icon__icon m-input-icon__icon--left">
                <span><i class="la la-search"></i></span>
              </span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-input-icon m-input-icon--left">
              <input class="btn btn-brand m-btn" type="button" value="BUSCAR">
            </div>
          </div>
        </div>
        <div id="calls-grid" class="row justify-content-center m-scrollable m-scroller ps ps--active-y"
          data-scrollbar-shown="true" data-scrollable="true" style="overflow:hidden; max-height: 300px">

          <table id="calls-table" class="table text-center">
            <thead>
              <tr>
                <th>HORA</th>
                <th>CLIENTE</th>
                <th>TELEFONO</th>
                <th>ESTADO</th>
                <th colspan="2">ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-info text-white">
                <td>{{'05:00 PM' }}</td>
                <td>{{'CARLOS MORA'}}</td>
                <td>{{'30011112233'}}</td>
                <td>{{'MARCANDO'}}</td>
                <td>
                  {{-- <button class="btn btn-warning btn-sm text-uppercase">{{'LLAMAR'}}</button> --}}
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
              <tr class="bg-success text-white">
                <td>{{'04:00 PM' }}</td>
                <td>{{'ANDRES ARIAS'}}</td>
                <td>{{'30011112233'}}</td>
                <td>{{'CONTESTARON'}}</td>
                <td>
                  {{-- <button class="btn btn-warning btn-sm text-uppercase">{{'LLAMAR'}}</button> --}}
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
              <tr class="bg-danger text-white">
                <td>{{'03:00 PM' }}</td>
                <td>{{'JHON DOE'}}</td>
                <td>{{'30011112233'}}</td>
                <td>{{'NO CONTACTADO'}}</td>
                <td>
                  <button class="btn btn-primary btn-sm text-uppercase">{{'LLAMAR'}}</button>
                  <button class="btn btn-warning btn-sm text-uppercase">{{'ENTREGADO'}}</button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@endsection
