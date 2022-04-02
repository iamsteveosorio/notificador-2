@extends('layouts.base')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <!--begin::Portlet-->
    <div class="m-portlet" id="m_portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              USUARIOS
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a href="{{ route('users.create') }}"
                class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
                <span>
                  <i class="la la-plus"></i>
                  <span>Agregar Usuario</span>
                </span>
              </a>
            </li>
            <li class="m-portlet__nav-item">
              <a href="{{ route('home') }}"
                class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
                <span>
                  <i class="fa fa-arrow-left"></i>
                  <span>volver</span>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="m-portlet__body">
        <!--begin: Search Form -->
        <form method="GET" action="{{ route('users') }}" accept-charset="UTF-8"
          class="m-form m-form--label-align-left- m-form--state-" enctype="multipart/form-data">
          <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
              <div class="col-xl-8 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                  <div class="col-md-6">
                    <div class="m-input-icon m-input-icon--left">
                      <input name="search" type="text" class="form-control m-input" placeholder="BUSCAR..."
                        value="{{$request->search?$request->search:''}}">
                      <span class="m-input-icon__icon m-input-icon__icon--left">
                        <span><i class="la la-search"></i></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="m-input-icon m-input-icon--left">
                      <input class="btn btn-brand m-btn" type="submit" value="BUSCAR">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!--end: Search Form -->
        <div class="table-responsive">
          @include('users.table')
        </div>
      </div>
    </div>
    <!--end::Portlet-->
  </div>
</div>
@endsection
@section('script')
<!--begin::Page Scripts -->
<script src="/assets/demo/custom/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script>
@endsection
