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
            <h1 class="text-uppercase">HOLA {{$wompi_order->customer}} !</h1>
            @if($again)
            <h3 class="mt-3 bg-white text-danger p-4">Algo salió mal con tu pago, quieres intentar de nuevo? </h3>
            @endif
            <h3 class="mt-3">El valor a pagar por tu pedido es: <strong>$
                {{number_format($wompi_order->amount,0)}}</strong> </h3>
          </div>
          <div class="m-widget7__button mt-5">
            <form action="https://checkout.wompi.co/p/" method="GET">
              <!-- OBLIGATORIOS -->
              <input type="hidden" name="public-key" value="pub_prod_NzVyhb4ZRcmrNT4db4k2E7DNT4aGgF6o" />
              {{-- <input type="hidden" name="public-key" value="pub_test_ROwbf6A2BpthvwhBuhySQ0zG8YyvVN5m" /> --}}
              <input type="hidden" name="currency" value="COP" />
              <input type="hidden" name="amount-in-cents" value="{{$wompi_order->amount*100}}" />
              <input type="hidden" name="reference"
                value="SAYOEXPO-{{$wompi_order->cc}}-{{$wompi_order->id}}-{{time()}}" />
              <!-- OPCIONALES -->
              <input type="hidden" name="redirect-url" value="https://wompi.sayonara.co/wompi_feedback" />
              {{-- <input type="hidden" name="tax-in-cents:vat" value="IVA_EN_CENTAVOS" />
              <input type="hidden" name="tax-in-cents:consumption" value="IMPOCONSUMO_EN_CENTAVOS" />--}}
              <input type="hidden" name="customer-data:email" value="{{$wompi_order->email}}" />
              <input type="hidden" name="customer-data:full-name" value="{{$wompi_order->customer}}" />
              <input type="hidden" name="customer-data:phone-number"
                value="{{str_replace(' ','',$wompi_order->phone)}}" />
              <input type="hidden" name="customer-data:legal-id" value="{{$wompi_order->cc}}" />
              <input type="hidden" name="customer-data:legal-id-type" value="CC" />
              {{-- <input type="hidden" name="shipping-address:address-line-1" value="DIRECCION_DE_ENVIO" />
              <input type="hidden" name="shipping-address:country" value="PAIS_DE_ENVIO" />
              <input type="hidden" name="shipping-address:phone-number" value="NUMERO_DE_TELEFONO_DE_QUIEN_RECIBE" />
              <input type="hidden" name="shipping-address:city" value="CIUDAD_DE_ENVIO" />
              <input type="hidden" name="shipping-address:region" value="REGION_DE_ENVIO" /> --}}
              <button class="btn m-btn--pill btn-lg btn-accent m-btn m-btn--custom m-btn--bolder m-btn--uppercase "
                type="submit">PAGAR</button>
            </form>
          </div>
        </div>

        <!--end::Widget 7-->
      </div>
    </div>

    <!--end:: Widgets/Announcements 1-->
  </div>
</div>



@endsection
