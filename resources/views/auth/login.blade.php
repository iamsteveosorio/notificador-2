<!DOCTYPE html>

<!--
	Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
	Author: KeenThemes
	Website: http://www.keenthemes.com/
	Contact: support@keenthemes.com
	Follow: www.twitter.com/keenthemes
	Dribbble: www.dribbble.com/keenthemes
	Like: www.facebook.com/keenthemes
	Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
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
  <link href="./vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Mandatory Vendors -->

  <!--begin:: Global Optional Vendors -->
  <link href="./vendors/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
    type="text/css" />
  <link href="./vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/animate.css/animate.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
  <link href="./vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />

  <!--end:: Global Optional Vendors -->

  <!--begin::Global Theme Styles -->
  <link href="./assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />

  <!--RTL version:<link href="../../../assets/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

  <!--end::Global Theme Styles -->
  <link rel="shortcut icon" href="./assets/app/media/img/icons/CORAZÓN-FLAT.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

  <!-- begin:: Page -->
  <div class="m-grid m-grid--hor m-grid--root m-page">
    <div
      class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2"
      id="m_login"
      style="background-image: url(../../../assets/app/media/img//bg/FONDO-LETRAS.png);background-position: bottom; background-repeat: repeat-x; background-size: 25%;">
      <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
        <div class="m-login__container">
          <div class="m-login__logo">
            <a href="#">
              {{-- <img style="width:15%; margin-bottom:30px;" src="./assets/app/media/img/logos/HAMBURGUESA-CORAZÓN.png"> --}}
              <img style="width:100%" src="./assets/app/media/img/logos/LOGO-ROJO.png">
            </a>
          </div>
          <div class="m-login__signin">
            <div class="m-login__head">
              <h2 class="m-login__title">Plataforma SAYO Notificaciones</h2>
            </div>
            <form class="m-login__form m-form" role="form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="form-group m-form__group">
                <input class="form-control m-input" id="dni" type="text" placeholder="Cedula" name="dni"
                  autocomplete="off" autofocus>
              </div>
              <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password"
                  name="password">
              </div>
              <div class="row m-login__form-sub">
                <div class="col m--align-right m-login__form-right">
                  <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">Olvide mi
                    password ?</a>
                </div>
                <div class="col m--align-right m-login__form-right">
                  @if($errors->any())
                  <span class="text-danger"> <b>{{$errors->first()}}</b></span>
                  @endif
                </div>
              </div>
              <div class="m-login__form-action">
                <button id="m_login_signin_submit" type="submit"
                  class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary"">Entrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Page -->



	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts -->


	<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
