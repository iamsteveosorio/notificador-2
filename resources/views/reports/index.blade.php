@extends('layouts.base')

@section('content')
<div class="row justify-content-right mb-4">
  <div class="col-md-3 offset-md-9">
    <a href="{{ route('home') }}"
      class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
      <span>
        <i class="fa fa-arrow-left"></i>
        <span>VOLVER</span>
      </span>
    </a>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-10">
    <form method="GET" action="{{ route('report') }}" accept-charset="UTF-8"
      class="m-form m-form--label-align-left- m-form--state-" enctype="multipart/form-data">
      <input id="downloadInput" type="hidden" name="download" value="0">
      <input id="showReport" type="hidden" name="showReport" value="1">
      <div class="row">
        <div class="col-lg-12">
          <!--begin::Portlet-->
          <div class="m-portlet" id="m_portlet">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">

                </div>
              </div>
            </div>
            <div class="m-portlet__body">
              <!--begin: Search Form -->
              <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                  <div class="col-xl-12 order-2 order-xl-1">
                    <div class="form-group row align-items-center">
                      <div class="col-md-2">
                        <div class="m-form__group--inline">
                          <div class="m-form__label">
                            <label>DESDE:</label>
                          </div>
                          <div class="m-form__control">
                            <input id="from" autocomplete="off" class="form-control datetimepicker m-input" name="from"
                              type="text" value="{{$request->from}}">
                          </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                      <div class="col-md-2">
                        <div class="m-form__group--inline">
                          <div class="m-form__label">
                            <label>HASTA:</label>
                          </div>
                          <div class="m-form__control">
                            <input id="to" autocomplete="off" class="form-control datetimepicker m-input" name="to"
                              type="text" value="{{ $request->to }}">
                          </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                      <div class="col-md-2">
                        <div class="m-form__group--inline">
                          <div class="m-form__label">
                            <label>PUNTO DE VENTA:</label>
                          </div>
                          <div class="m-form__control">
                            <select name="point_sale_id" class="form-control m-input" id="m_form_puntoVenta">
                              <option value="">TODOS</option>
                              @foreach($points as $p)
                              @php $checked = $p->id == $request->point_sale_id? 'selected': '' @endphp
                              <option value="{{$p->id}}" {{$checked}}>{{$p->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                      {{-- <div class="col-md-2">
                        <div class="m-form__group--inline">
                          <div class="m-form__label">
                            <label>TIPO DE CAMPA:</label>
                          </div>
                          <div class="m-form__control">
                            <select name="campaing_type_id" id="campaing_type_id" class="form-control">
                              <option value="">SELECCIONE UN TIPO CAMPAÑA</option>
                              @foreach ($types as $s)
                              @php $selected = $s->id == $request->campaing_type_id ? 'selected': ''
                              @endphp
                              <option value="{{$s->id}}" {{$selected}}>{{$s->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div> --}}
                      <div class="col-md-4">
                        <div class="m-form__group--inline">
                          <div class="m-form__label">
                            <label class="m-label m-label--single"></label>
                          </div>
                          <div class="m-form__control">
                            <button class="btn btn-brand m-btn" type="submit"
                              onclick="$('#downloadInput').val(0);">FILTRAR</button>
                            {{-- <button class="btn btn-success m-btn" type="submit"
                              onclick="$('#downloadInput').val(1);">DESCARGAR EXCEL</button> --}}
                          </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--end: Search Form -->
              <div class="table-responsive">
                @include('reports.table')
              </div>
              @if(count($wompi_orders)>0)
              {!! $wompi_orders->appends(['from' => Request::get('from'),'to' => Request::get('to'),'point_sale_id' =>
              Request::get('point_sale_id'),'showReport'=>Request::get('showReport')])->render() !!}
              @endif
            </div>
          </div>
        </div>
        <!--end::Portlet-->
      </div>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
{{-- <script src="/assets/demo/custom/crud/metronic-datatable/base/html-table.js" type="text/javascript"></script> --}}
<script>
  // $(()=>{
  //   $('body .done_order').on('click',function(e){
  //     e.preventDefault();
  //     // console.log($(this));
  //     mApp.block('body', {
  //       overlayColor: '#000000',
  //       type: 'loader',
  //       state: 'success',
  //       message: 'Actualizando pedidos...'
  //   });
  //     $(location).prop('href', $(this).attr('href'));
  //   });
  // });
  $('.datetimepicker').datepicker({
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy-mm-dd'
	});
</script>

@endsection
