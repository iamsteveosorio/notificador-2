@extends('layouts.base')

@section('content')
<form method="GET" action="{{ route('repMarcacionDiaria') }}" accept-charset="UTF-8" class="m-form m-form--label-align-left- m-form--state-" enctype="multipart/form-data">
    <input id="downloadInput" type="hidden" name="download" value="0">
    <input id="showReport" type="hidden" name="showReport" value="1">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet" id="m_portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-map-location"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                REPORTE MARCACION DIARIA
                            </h3>
                        </div>
                    </div>
                    {{-- <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <button class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air downloadBtn"  onclick="$('#downloadInput').val(1);">Download</button>
                            </li>
                        </ul>
                    </div> --}}
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
                                                <label>FECHA:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <input id="fechaInicio" autocomplete="off" class="form-control datetimepicker m-input" name="from" type="text"  value="{{$request->from}}" required>
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
                                                <select name="idPuntoVenta" class="form-control m-input  m-select2">
                                                    <option value="">TODOS</option>
                                                    @foreach($puntosVenta as $puntoVenta)
                                                    @php $checked =  $puntoVenta->idPuntoVenta == $request->idPuntoVenta? 'selected': '' @endphp
                                                    <option value="{{$puntoVenta->idPuntoVenta}}" {{$checked}}>{{$puntoVenta->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-form__group--inline">
                                            <div class="m-form__label">
                                                <label>CARGO:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <select name="idCargo" class="form-control m-input m-select2">
                                                    <option value="">TODOS</option>
                                                    @foreach($cargos as $cargo)
                                                    @php $checked =  isset($request->idCargo) && $cargo->idCargo==$request->idCargo? 'selected': '' @endphp
                                                    <option value="{{$cargo->idCargo}}" {{$checked}}>{{$cargo->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="m-form__group--inline">
                                            <div class="m-form__label">
                                                <label class="m-label m-label--single"></label>
                                            </div>
                                            <div class="m-form__control">
                                                <button class="btn btn-brand m-btn" type="submit" onclick="$('#downloadInput').val(0);">FILTRAR</button>
                                                <button class="btn btn-success m-btn" type="submit" onclick="$('#downloadInput').val(1);">DESCARGAR EXCEL</button>
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
                        @include('administrador.reportes.marcacionDiariaTabla')
                    </div>
                    @if(count($empleados)>0)
                    {!! $empleados->appends(['from' => Request::get('from'),'idPuntoVenta' => Request::get('idPuntoVenta'),'idCargo' => Request::get('idCargo'),'showReport'=>Request::get('showReport')])->render() !!}
                    @endif
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</form>
@endsection
@section('script')
<script>
    $('.datetimepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        orientation: "bottom left"
    });
</script>
@endsection
