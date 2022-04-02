@extends('layouts.base-2')

@section('content')

<div id="new-calls-grid" class="row justify-content-center mt-5">
  <div class="col-sm-12 col-md-6">
    <!--begin:: Widgets/Announcements 1-->
    <div class="m-portlet m--bg-transparent m-portlet--bordered-semi m-portlet--full-height "
      style="background-color: transparent">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption  mt-5 pb-5">
          <div class="m-portlet__head-title">
            <h2 class="m-portlet__head-text text-uppercase" style="font-size:2.5rem;">
            </h2>

          </div>
        </div>
      </div>
      <div class="m-portlet__body">
        <!--begin::Widget 7-->
        <div class="m-widget7 m-widget7--skin-dark">
          <div class="m-widget7__desc" style="margin-top: 1rem;">
            <h1 class="text-uppercase">GRACIAS POR TU COMPRA !</h1>
            <h3 class="mt-3"> Tu pedido esta programado para entregar el <br><strong>
                {{\Carbon\Carbon::now()->format('F j, Y')}}</strong> , a las
              <strong>{{$wompi_order->hour}}</strong> </h3>
            <h3 class="mt-3"> Te llamaremos al, <strong> {{$wompi_order->phone}} </strong> para que recibas tu pedido
            </h3>
            <h3 class="mt-3"> Recógelo en: SAYONARA Plazoleta de comidas ExpoCamello</h3>
          </div>
        </div>
        <!--end::Widget 7-->
      </div>
    </div>

    <!--end:: Widgets/Announcements 1-->
  </div>
</div>



@endsection
