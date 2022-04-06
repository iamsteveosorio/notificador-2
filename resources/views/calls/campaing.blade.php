@extends('layouts.base')

@section('content')
<div class="row justify-content-right mb-4">
  <div class="col-md-6 offset-md-3">
    <h1 class="text-center text-black"><strong>-- {{$point->name}} --</strong></h1>
  </div>
  <div class="col-md-3">
    <button type="button" class="m-btn m-btn--pill btn btn-focus text-uppercase p-4 mr-4" onclick="manual_call()"
      role="button"><i class="fa fa-phone text-white" style="font-size: 1.6em"></i></button>
    <a href="{{ route('calls',$campaing->campaing_type_id) }}"
      class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air text-uppercase">
      <span>
        <i class="fa fa-arrow-left"></i>
        <span>volver</span>
      </span>
    </a>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_1" style="position: fixed;
    right: 13%;
    background: white;
    /* color: beige; */
    border: solid 3px #D52430;
    border-radius: 50px;
    padding: 22px 16px;
}"> <i class="fa fa-phone-volume" style="    color: red;
        font-size: 3em;"></i></button> --}}

  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="m-portlet" id="m_portlet_tickets" style="background-color: #eaeaea;">
      <div class="m-portlet__head justify-content-center border-0">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            {{-- <h3 class="m-portlet__head-text text-uppercase">
              PEDIDOS
            </h3> --}}
          </div>
        </div>
      </div>
      <div class="m-portlet__body pt-0">
        <div class="form-group m-form__group row align-items-center">
          <div class="col-md-6">
            <div class="m-input-icon m-input-icon--left">
              <input id="keyword-ticket" name="keyword" type="text" class="form-control m-input" placeholder="BUSCAR..."
                value="">
              <span class="m-input-icon__icon m-input-icon__icon--left">
                <span><i class="la la-search"></i></span>
              </span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-input-icon m-input-icon--left">
              <input class="btn btn-info m-btn" type="button" value="BUSCAR" onclick="loadTicketsTable();">
            </div>
          </div>
        </div>
        <div id="new-calls-grid" class="row justify-content-center mt-5">

        </div>
      </div>
    </div>
  </div>
</div>


<!--begin::Modal-->
<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form class="text-center" action="{{route('order.manual_call')}}" method="POST">
        <div class="modal-header">
          <h3 class="text-center" id="exampleModalLabel">INGRESAR EL NUMERO DEL CELULAR</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="row justify-content-center">
                @csrf
                <input type="hidden" id="modal_order_id" name="order_id" value="">
                <input type="text" inputmode="numeric" class="form-control border border-dark" id="phone" name="phone"
                  style="font-size: 4em; text-align: center; height: 65px;" required>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button"
            class="btn m-btn--pill btn-lg btn-secondary m-btn m-btn--custom m-btn--bolder m-btn--uppercase mt-3"
            data-dismiss="modal">CANCELAR</button>
          <input type="submit"
            class="btn m-btn--pill btn-lg btn-danger m-btn m-btn--custom m-btn--bolder m-btn--uppercase mt-3"
            value="LLAMAR">
        </div>
      </form>
    </div>
  </div>
</div>

<!--end::Modal-->
@endsection
@section('script')
<script>
  var point = '{{$point_id}}';
  var campaing = '{{$campaing->id}}';
  $(()=>{
    // loadCallsTable();
    // var intervalId = window.setInterval(function(){
    //   loadCallsTable();
    // }, 30000);

    loadTicketsTable();

    var intervalId = window.setInterval(function(){
      loadTicketsTable();
    }, 50000);
  });

  function loadCallsTable(){
    mApp.block('#m_portlet_table', {
        overlayColor: '#000000',
        type: 'loader',
        state: 'success',
        message: 'Actualizando llamadas...'
    });

    let url = "{{route('calls.grid',['point_id'=>'Temp','id'=>'Temp2'])}}";
    url = url.replace('Temp',point);
    url = url.replace('Temp2',campaing);
    $.ajax({
      url: url,
      data:{
        keyword: $('#keyword').val()
      },
      success: function(data) {
        mApp.unblock('#m_portlet_table');
        $('#calls-grid').html(data);
      }
    });
  }
  function loadTicketsTable(){
    mApp.block('#m_portlet_tickets', {
        overlayColor: '#000000',
        type: 'loader',
        state: 'info',
        message: 'Actualizando pedidos...'
    });
    let url2 = "{{route('calls.new_calls_grid',['point_id'=>'Temp','id'=>'Temp2'])}}";
    url2 = url2.replace('Temp',point);
    url2 = url2.replace('Temp2',campaing);
    $.ajax({
      url: url2,
      data:{
        keyword: $('#keyword-ticket').val()
      },
      success: function(data) {
        mApp.unblock('#m_portlet_tickets');
        $('#new-calls-grid').html(data);
      }
    });

  }



  function delivered_order(order_id){
    var btn = $('#delivery-button-'+order_id);
    console.log(btn);
    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
    let url2 = "{{route('order.delivered',['id'=>'Temp2'])}}";
    url2 = url2.replace('Temp2',order_id);
    $.ajax({
      url: url2,
      success: function(data) {
        loadTicketsTable();
      }
    });
  }

  function ready_to_go(order_id){
    var btn = $('#ready-button-'+order_id);
    console.log(btn);
    btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
    let url2 = "{{route('order.ready',['id'=>'Temp2'])}}";
    url2 = url2.replace('Temp2',order_id);
    $.ajax({
      url: url2,
      success: function(data) {
        loadTicketsTable();
      }
    });
  }

  function call_order(order_id){
    var btn = $('#call-button-'+order_id);
    console.log(btn);
    btn.addClass('m-loader m-loader--right m-loader--danger').attr('disabled', true);
    let url2 = "{{route('order.call',['id'=>'Temp2'])}}";
    url2 = url2.replace('Temp2',order_id);
    $.ajax({
      url: url2,
      success: function(data) {
        console.log(data);
        loadTicketsTable();
      }
    });
  }

  function whatsapp_order(order_id){
    var btn = $('#whatsapp-button--'+order_id);
    console.log(btn);
    btn.addClass('m-loader m-loader--right m-loader--danger').attr('disabled', true);
    let url2 = "{{route('order.whatsapp',['id'=>'Temp2'])}}";
    url2 = url2.replace('Temp2',order_id);
    $.ajax({
      url: url2,
      success: function(data) {
        console.log(data);
        loadTicketsTable();
      }
    });
  }

  function manual_call(order_id){
    $('#modal_order_id').val(order_id);
    $('#m_modal_1').modal('show');
  }
</script>
@endsection
