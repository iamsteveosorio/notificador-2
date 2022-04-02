var todayDate = moment().startOf("day");
var now = moment();
var YM = todayDate.format("YYYY-MM");
var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
var TODAY = todayDate.format("YYYY-MM-DD");
var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");
var ONEHOURLATE = now.clone().add(1, "hour").format("YYYY-MM-DD HH:mm");
var fechaInicio;
var fechaFin;

var arrows;
if (mUtil.isRTL()) {
    arrows = {
        leftArrow: '<i class="la la-angle-right"></i>',
        rightArrow: '<i class="la la-angle-left"></i>'
    }
} else {
    arrows = {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>'
    }
}

$('body').on('change', '#fechaInicio', function(){
  fechaInicio = moment($(this).val());
});
$('body').on('change', '#fechaFin', function(){
  fechaFin = moment($(this).val());
});

$('body').on('change', '#turno', function(){
  $('.m-loader').show();
  if($(this).find(':selected').data('tipo')){
    console.log($(this).val());
    $('body #idTipoNovedad').val($(this).val());
    $.ajax({
      url: '/getTimeTipoNovedad',
      data: {
        id: $(this).val(),
      },
      type: "get",
      success: function(response) {
        $('body #horaInicio').val(response.horaInicio);
        $('#horaInicio').timepicker('setTime',response.horaInicio);
        $('body #horaFin').val(response.horaFin);
        $('.m-loader').hide();
      }
    });
  }
  else{
    $('body #idTipoNovedad').val(1);
    $.ajax({
      url: '/getTime',
      data: {
        id: $(this).val(),
      },
      type: "get",
      success: function(response) {
        $('body #horaInicio').val(response.horaInicio);
        $('#horaInicio').timepicker('setTime',response.horaInicio);
        $('body #horaFin').val(response.horaFin);
        $('.m-loader').hide();
      }
    });
    $.ajax({
      url: '/getAreas',
      data: {
        id: $(this).val(),
      },
      type: "get",
      success: function(response) {
        $("body #areas").html(response);
        $('.timepicker').timepicker({
          defaultTime: '08:00:00',
          minuteStep: 15,
          showMeridian: false,
          snapToStep: true
        });
        $('body #m_repeater_1').repeater({
          initEmpty: false,
          defaultValues: {
            'text-input': 'foo'
          },
          show: function () {
            $(this).slideDown();
            $('body #m_timepicker_1, body #m_timepicker_1_modal').timepicker({
              defaultTime: '08:00:00',
              minuteStep: 15,
              showMeridian: false,
              snapToStep: true
            });
          },
          hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
          }
        });
        $('.m-loader').hide();
      }
    });
  }


});
$('.action').click(function(e){
  e.preventDefault();
  mApp.blockPage({
    overlayColor: '#000000',
    state: 'primary'
  });
  $.ajax({
    url: $(this).attr("href"),
    type: 'get',
    success: function(response){
      $('.modal-body').html(response);
      $('.timepicker').timepicker({
        defaultTime: '08:00:00',
        minuteStep: 15,
        showMeridian: false,
        snapToStep: true
      });
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        rtl: mUtil.isRTL(),
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
      });
      mApp.unblockPage();
      $('#modal').modal('show');
    }
  });
});

$('body').on('click','#horarios-submit',function(e) {
  console.log('ENTRA FORM');
  e.preventDefault();
  var btn = $(this);
  var form = $(this).closest('form');

  form.validate({
    rules: {
      fechaInicio: {
        required: true
      },
      fechaFin: {
        required: true
      },
      idEmpleado: {
        required: true
      },
      idTurno: {
        required: true
      }
    }
  });
  if (!form.valid()) {
    return;
  }
  if(fechaFin < fechaInicio){
    $('body #fechaFin-msg').show();
    $('body #fechaFin-lbl').css('color:red;');
    return;
  }

  btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
  form.ajaxSubmit({
    url: form.attr('action'),
    error:function(){
      // similate 2s delay
      setTimeout(function() {
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
        showErrorMsg(form, 'danger', 'Usuario o password incorrecto, por favor intenta de nuevo');
      }, 2000);
    },
    success: function(response, status, xhr, $form) {
      console.log(response);
      console.log(response.hasOwnProperty('success'));
      if(response.hasOwnProperty('success')){
        console.log('ENTRA');
        $("#m_calendar2").fullCalendar( 'refetchEvents' );
        // $("#m_calendar2").fullCalendar( 'refetchResources' );
        setTimeout(function() {
          $('#modal').modal('hide');
        }, 2000);
      }else{
        console.log($('#modal #errors'));
        $('#modal #errors').html('<p>'+response.error+'</p>');
        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
      }

    }
  });
});

$('body').on('click','#delete-horario',function(e) {
  console.log('ENTRA');
  e.preventDefault();
  var btn = $(this);
  btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
  $.ajax({
    url: btn.attr('href'),
    success: function(result){
      $("#m_calendar2").fullCalendar( 'refetchEvents' );
      // $("#m_calendar2").fullCalendar( 'refetchResources' );
      setTimeout(function() {
        $('#modal').modal('hide');
      }, 2000);
    }
  });
});

$('body').on('change', '#puntosVenta', function(){
  console.log('ENTRAEMPLEADOS');
  $('.m-loader').show();
  $.ajax({
    url: '/getEmpleados/'+ $(this).val(),
    type: "get",
    success: function(response) {
      $('body #idEmpleado').find('option').remove().end();
        $.each(response, function(i, value) {
          $('body #idEmpleado').append($('<option>').text(value.nombre).attr('value', value.idEmpleado));
        });
      $('.m-loader').hide();
    }
  });
  // $.ajax({
  //   url: '/getAreas',
  //   data: {
  //     id: $(this).val(),
  //   },
  //   type: "get",
  //   success: function(response) {
  //     $("#areas").html(response);
  //     $('.datetimepicker').datetimepicker({
  //       todayHighlight: true,
  //       autoclose: true,
  //       format: 'yyyy-mm-dd hh:ii',
  //       startDate: '+1d'
  //     });
  //     FormRepeater.init();
  //     $('.m-loader').hide();
  //   }
  // });
});

$('body').on('change', '#idPuntoVenta', function(){
  console.log('IDPUNTOVENTA');
  $('.m-loader').show();
  $.ajax({
    url: '/getTurnos/'+ $(this).val(),
    type: "get",
    success: function(response) {
      console.log(response);
      $('body #turno').find('option').remove().end();
        $.each(response.turnos, function(i, value) {
          $('body #turno').append($('<option>').text(value.nombre).attr('value', value.idTurno).attr('data-tipo', 0));
        });
        $.each(response.tiposNovedades, function(i, value) {
          $('body #turno').append($('<option>').text(value.concepto).attr('value', value.idTipoNovedad).attr('data-tipo', 1));
        });
       $('.m-loader').hide();
    }
  });
});


// $('#empleadoSelector').on('change',function(){
//   // $('#m_calendar2').fullCalendar('rerenderResources');
//   $('#m_calendar2').fullCalendar('rerenderEvents');
// });
