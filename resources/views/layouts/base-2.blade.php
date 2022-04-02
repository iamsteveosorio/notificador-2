<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->

<head>
  <meta charset="utf-8" />
  <title>Sayonara | Plataforma de Notificaciones</title>
  <meta name="description" content="Latest updates and statistic charts">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <!--begin::Web font -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
    WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
  </script>
  <!--end::Web font -->

  <!--begin:: Global Mandatory Vendors -->
  <link href="/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Mandatory Vendors -->


  <!--begin:: Global Optional Vendors -->
  <link href="/vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
    type="text/css" />
  <link href="/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
  <link href="/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Optional Vendors -->

  <!--begin::Global Theme Styles -->
  <link href="/assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles -->
  <!--begin::Page Vendors Styles -->
  <link href="/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <link href="/assets/vendors/custom/fullcalendar/scheduler.css" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.0/fullcalendar.print.css" rel="stylesheet"
    media="print" />
  <!--end::Page Vendors Styles -->
  <link rel="shortcut icon" href="/assets/app/media/img/icons/CORAZÓN-FLAT.png" />
  <style>
    .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text,
    .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
      /* color: #FFF; */
    }

    .calendar-parent {
      height: 100vh;
    }

    .fc-toolbar {
      padding: 15px 20px 10px;
    }

    .fc-event {
      cursor: pointer;
    }

    /* .m-separator.m-separator--lg{
			margin: 12px 0px;
		} */
    .m-form .m-form__section {
      margin: 12px 0px;
    }

    .fc-sun {
      color: red;
    }

    .diaFestivo {
      background-color: red;
    }
  </style>
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body style="background-image: url({{asset('assets/app/media/img/bg/wompi.png')}});"
  class="m--skin- m-header--fixed m-header--fixed-mobile">

  <div class="m-grid m-grid--hor m-grid--root m-page">
    {{-- @include('layouts.partials._header-baseAdmin') --}}
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
      <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-login__logo col-md-3" style="margin: auto">
          <a href="#">
            <img style="width:100%" src="{{asset('assets/app/media/img/logos/LOGO-SAYONARA-BLANCO.png')}}">
          </a>
          <h3 class="text-black"><strong></strong></h3>
        </div>
        <div class="m-content">@yield('content')</div>
      </div>
    </div>
    @include('layouts.partials./_footer-default')
  </div>

  <!--begin:: Global Mandatory Vendors -->
  <script src="/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
  <script src="/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
  <script src="/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
  <script src="/vendors/moment/min/moment.min.js" type="text/javascript"></script>
  <script src="/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
  <script src="/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
  <script src="/vendors/wnumb/wNumb.js" type="text/javascript"></script>

  <!--end:: Global Mandatory Vendors -->

  <!--begin:: Global Optional Vendors -->
  <script src="/vendors/jquery.repeater/src/lib.js" type="text/javascript"></script>
  <script src="/vendors/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
  <script src="/vendors/jquery.repeater/src/repeater.js" type="text/javascript"></script>
  <script src="/vendors/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
  <script src="/vendors/block-ui/jquery.blockUI.js" type="text/javascript"></script>
  <script src="/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript">
  </script>
  <script src="/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script src="/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
  <script src="/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript">
  </script>

  <!--end:: Global Optional Vendors -->

  <!--begin::Global Theme Bundle -->
  <script src="/assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
  <!--end::Global Theme Bundle -->
  <!--begin::Page Vendors -->

  <script src="/assets/demo/custom/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>
  <!--end::Page Scripts -->

  @yield('script')

</body>
<!-- end::Body -->

</html>
