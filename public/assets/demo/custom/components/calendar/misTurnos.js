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
				header: {
					left: "prev,next today",
					center: "title",
					right: ""
				},
				editable: false,
				defaultView: "listDay",
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
				events: misTurnos,
				eventDurationEditable: false,
				eventRender: function(event, element) {
					if (element.hasClass('fc-timeline-event')) {
						element.data('content', event.description);
						element.data('placement', 'top');
						mApp.initPopover(element);
					} else if (element.hasClass('fc-time-grid-event')) {
						element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>');
					} else if (element.find('.fc-list-item-title').lenght !== 0) {
						// var resource = $("#m_calendar2").fullCalendar("getResourceById",event.resourceId);
						// element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>');
						// element.find('.fc-list-item-title').append('<div class="m--font-boldest m--font-danger">' + resource.title + '</div>');
					}
				},
				displayEventTime: false
			});
		}
	};
})();

jQuery(document).ready(function() {
	CalendarBasic.init();
});
