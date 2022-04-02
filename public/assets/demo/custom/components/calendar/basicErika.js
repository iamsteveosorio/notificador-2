var CalendarBasic = (function() {
	return {
		//main function to initiate the module
		init: function() {
			var todayDate = moment().startOf("day");
			var YM = todayDate.format("YYYY-MM");
			var YESTERDAY = todayDate.clone().subtract(1, "day").format("YYYY-MM-DD");
			var TODAY = todayDate.format("YYYY-MM-DD");
			var TOMORROW = todayDate.clone().add(1, "day").format("YYYY-MM-DD");
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

			$("#m_calendar2").fullCalendar({
				locale: 'es',
				height: "parent",
				schedulerLicenseKey:"CC-Attribution-NonCommercial-NoDerivatives",
				isRTL: mUtil.isRTL(),
				// customButtons: {
        //   printButton: {
        //     icon: 'print',
        //     click: function() {
        //       window.print();
        //     }
        //   }
        // },
				header: {
					left: "prev,next today",
					center: "title",
					right: "timelineDay,mytimelineWeek,timelineMonth,timelineYear,listWeek"
				},
				editable: true,
				defaultView: "mytimelineWeek",
				defaultDate: moment().startOf("isoweek"),
				views: {
					mytimelineWeek: {
						type: "timeline",
						duration: { days: 7 },
						slotDuration: { days: 1 },
						buttonText: "Semana"
					},
					timelineDay:{
						titleFormat: 'dddd, DD MMMM YYYY'
					}
				},
				loading: function (bool) {
					if (bool)
					mApp.blockPage({
						overlayColor: '#000000',
						state: 'danger'
					});
					else
					mApp.unblockPage(); // Add your script to show loading
				},
				resourceRender: function(resourceObj, $td) {
					$td.eq(1).find(".fc-cell-content").addClass("m--font-boldest");
					$td.first().find('.fc-cell-content').prepend(resourceObj.cinturon);
				},
				dayRender: function(date, cell) {
					if(diasFestivos.some(dia =>dia.fecha===moment(date).format('YYYY-MM-DD'))){
						var dia = diasFestivos.find(dia => {
							return dia.fecha === moment(date).format('YYYY-MM-DD')
						});
						$('.fc-head').find('[data-date='+moment(date).format('YYYY-MM-DD')+']').addClass('alert-danger');
						$('.fc-head').find('[data-date='+moment(date).format('YYYY-MM-DD')+']').find('.fc-cell-text').html(dia.descripcion);
					}
				},
				nextDayThreshold: "00:00:00",
				refetchResourcesOnNavigate: true,
				resourceGroupField: "puntoVenta",
				resources: "/getResourcesErika",
				resourceColumns: [
					{
						labelText: "Empleado",
						field: "title",
						width: 365
					},
					{
						labelText: "Saldo",
						field: "saldoHoras",
						width: 70
					},
					{
						labelText: "Pdas",
						field: "programadas",
						width: 70
					},
					{
						labelText: "Ldas",
						field: "trabajadas",
						width: 70
					}
				],
				events: "/getEventsErika",
				eventDurationEditable: false,
				eventDrop: function(info) {
					$('.m-popover').remove();
					$.ajax({
						data: {
							idEmpleado: info.resourceId,
							idHorario: info.id,
							horaInicio: info.start.format('HH:mm:ss'),
							horaFin: info.end.format('HH:mm:ss'),
							fechaInicio: info.start.format('YYYY-MM-DD')
						},
						url: "/updateHorario/"+info.id,
						success: function(response) {
							console.log(response);
							$('#m_calendar2').fullCalendar('refetchResources', {
								resources: '/getResourcesErika'
							});
						}
					});
				},
				eventRender: function(event, element) {
					if (element.hasClass('fc-timeline-event')) {
						element.data('content', event.description);
						element.data('placement', 'top');
						mApp.initPopover(element);
					} else if (element.hasClass('fc-time-grid-event')) {
						element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>');
					} else if (element.find('.fc-list-item-title').lenght !== 0) {
						var resource = $("#m_calendar2").fullCalendar("getResourceById",event.resourceId);
						element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>');
						element.find('.fc-list-item-title').append('<div class="m--font-boldest m--font-danger">' + resource.title + '</div>');
					}
				},
				displayEventTime: false,
				dayClick: function(date, jsEvent, view, resourceObj) {
					mApp.blockPage({
						overlayColor: '#000000',
						state: 'primary'
					});
					$.ajax({
						url: '/horarios/create',
						data: {
							empleadoId: resourceObj.id,
							date: date.format()
						},
						type: "get",
						success: function(response) {
							$(".modal-body").html(response);
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
							$('body #turno').select2({placeholder: "Elige el turno"});
							mApp.unblockPage();
							$("#modal").modal("show");
						}
					});
				},
				eventClick: function(calEvent, jsEvent, view) {
					mApp.blockPage({
						overlayColor: '#000000',
						state: 'primary'
					});
					$.ajax({
						url: '/horarios/'+calEvent.id+'/edit',
						type: "get",
						success: function(response) {
							$(".modal-body").html(response);
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
							$('body #turno').select2({placeholder: "Elige el turno"});
							fechaInicio = $('#fechaInicio').val();
							fechaFin = $('#fechaFin').val();
							FormRepeater.init();
							mApp.unblockPage();
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
							$("#modal").modal("show");
						}
					});

				}
			});
		}
	};
})();

jQuery(document).ready(function() {
	CalendarBasic.init();
});
