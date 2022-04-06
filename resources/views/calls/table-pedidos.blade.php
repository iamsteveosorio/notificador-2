@foreach ($orders as $order)

@php
$color = $order->last_call()? config('callzi.' .$order->last_call()->callzi_status.'_COLOR'): '';
if($order->cooked_at && ($order->customer == 'PLATAFORMA' || $order->customer == 'RAPPI' || $order->customer ==
'Rappi')){
$color = 'brand text-white';
}
if(!$order->customer || !$order->phone || $order->phone == ''){
$color = 'warning text-white';
}
@endphp
<div class="col-sm-10 col-md-12">
  <div id="order-{{$order->id}}"
    class="m-portlet m--bg-{{$color}} m-portlet--bordered-semi m-portlet--skin-light m-portlet--full-height ">
    <div class="m-portlet__body" style="padding: 2.2rem 2.2rem">
      @if($order->last_call())
      <div class="row justify-content-end mb-2">
        <div class="col-md-3 text-center">
          <p class="text-white">
            <span class="mr-3"> {{'INTENTO'}} {{count($order->calls)}} </span>
            <strong>{{config('callzi.'.$order->last_call()->callzi_status)}}</strong>
          </p>
        </div>
      </div>
      @endif
      <div class="row justify-content-center">
        <div class="col-md-1 pt-3 text-center pl-0 pr-0 {{$color}}">
          <h5>{{\Carbon\Carbon::parse($order->siesa_date)->format('g:i A')}}</h5>
        </div>
        <div class="col-md-2 pt-3 text-center {{$color}}">
          <h5>{{$order->ticket}}</h5>
        </div>
        <div class="col-md-3 pt-3 text-center {{$color}}">
          <h5>{{$order->customer}}</h5>
        </div>
        <div class="col-md-2 pt-3 text-center {{$color}}">
          <h5>TEL: {{$order->phone}}</h5>
        </div>
        <div class="col-md-1 pt-3 text-center {{$color}}">
          <h5>${{number_format($order->amount,0)}}</h5>
        </div>
        <div class="col-md-3 text-center">
          @if($order->send_whatsapp < 2) <button type="button" id="whatsapp-button-{{$order->id}}"
            class="m-btn m-btn--pill btn btn-success text-uppercase p-4 mr-4""
            style=" background-color: {{$order->send_whatsapp == 0 ? '#25D366' : '#D6D6D6'}}; border-color:
            {{$order->send_whatsapp == 0 ? '#25D366' : '#D6D6D6'}}" onclick="whatsapp_order({{$order->id}})"
            role="button"><i class="fab	fa-whatsapp text-white" style="font-size: 1.6em"></i></button>
            @endif
            @if($order->customer == 'PLATAFORMA' || $order->customer == 'RAPPI' || $order->customer == 'Rappi')
            @if(!$order->cooked_at)
            <button type="button" id="ready-button-{{$order->id}}"
              class="m-btn m-btn--pill btn btn-warning text-uppercase p-4 mr-4" onclick="ready_to_go({{$order->id}})"
              href="javascript:;" role="button"><i class="fa fa-shipping-fast text-white"
                style="font-size: 1.6em"></i></button>
            @endif
            @else
            <button type="button" id="call-button-{{$order->id}}"
              class="m-btn m-btn--pill btn btn-primary text-uppercase p-4 mr-4" onclick="call_order({{$order->id}})"
              href="javascript:;" role="button"><i class="fa fa-phone-volume text-white"
                style="font-size: 2em"></i></button>
            @endif
            <button type="button" id="delivery-button-{{$order->id}}"
              class="m-btn m-btn--pill btn btn-success text-uppercase p-4 mr-4""
            style=" background-color: #2ca189; border-color: #2ca189" onclick="delivered_order({{$order->id}})"
              role="button"><i class="fa fa-check text-white" style="font-size: 1.6em"></i></button>
            <button type="button" id="delivery-button-{{$order->id}}"
              class="m-btn m-btn--pill btn btn-focus text-uppercase p-4 mr-4" onclick="manual_call({{$order->id}})"
              role="button"><i class="fa fa-phone text-white" style="font-size: 1.6em"></i></button>
        </div>
      </div>
    </div>
  </div>
  <!--end:: Widgets/Announcements 1-->
</div>
@endforeach
