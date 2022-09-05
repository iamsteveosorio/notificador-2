<div class="m-grid m-grid--hor m-grid--root m-page">
  {{-- @include('layouts.partials._header-baseAdmin') --}}
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop pt-5">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
      <div class="m-login__logo col-md-3" style="margin: auto">
        {{-- <a href="#">
          <img style="width:100%" src="{{asset('assets/app/media/img/logos/LOGO-ROJO.png')}}">
        </a> --}}
        <h3 class="text-black text-center"><strong>PLATAFORMA SAYO NOTIFICACIONES</strong></h3>
      </div>
      <div class="m-content">@yield('content')</div>
    </div>
  </div>
  @include('layouts.partials./_footer-default')
</div>
