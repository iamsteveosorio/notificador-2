<!-- BEGIN: Horizontal Menu -->
<button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark "
  id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div id="m_header_menu"
  class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
  <ul class="m-menu__nav m-menu__nav--submenu-arrow ">
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="{{route('reportesAdministrador')}}" class="m-menu__link" title="">
        <i class="m-menu__link-icon flaticon-line-graph"></i>
        <span class="m-menu__link-text">REPORTES</span>
      </a>
    </li>
    <!-- @if(Auth::user()->isAdmin())
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="{{url('aprobaciones')}}" class="m-menu__link" title="">
        <i class="m-menu__link-icon flaticon-interface-10"></i>
        <span class="m-menu__link-text">APROBAR NOVEDADES</span>
      </a>
    </li>
    @endif -->
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="{{route('programacion')}}" class="m-menu__link m--font-danger" title="">
        <i class="m-menu__link-icon flaticon-calendar-1 m--font-danger"></i>
        <span
          class="m-menu__link-text m--font-danger">{{Auth::user()->isAdmin()?'MI PROGRAMACION':'PROGRAMACION'}}</span>
      </a>
    </li>
    @if(in_array(Auth::user()->idCargo,array(1,3,4,8)))
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="/editarMaraciones" class="m-menu__link" title="">
        <i class="m-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i>
        <span class="m-menu__link-text">MODIFICAR MARCACION HORARIOS</span>
      </a>
    </li>
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="javascript:;" class="m-menu__link m-menu__toggle" title=""><i
          class="m-menu__link-icon flaticon-customer"></i><span class="m-menu__link-text">NOMINA</span><i
          class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
      <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
        <span class="m-menu__arrow m-menu__arrow--adjust"></span>
        <ul class="m-menu__subnav">
          <li class="m-menu__item " aria-haspopup="true">
            <a href="/paghd" class="m-menu__link "><i class="m-menu__link-icon flaticon-coins"></i><span
                class="m-menu__link-text">PAGO HORAS DINERO</span></a>
          </li>
          <li class="m-menu__item " aria-haspopup="true">
            <a href="/quincenas" class="m-menu__link "><i
                class="m-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i><span
                class="m-menu__link-text">QUINCENAS DE NOMINA</span></a>
          </li>
          <li class="m-menu__item " aria-haspopup="true">
            <a href="/liquidarNominaSiesa" class="m-menu__link "><i
                class="m-menu__link-icon flaticon-paper-plane-1"></i><span class="m-menu__link-text">NOMINA A
                SIESA</span></a>
          </li>
          {{-- <li class="m-menu__item " aria-haspopup="true">
          <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
            m-menu-link-redirect="1" aria-haspopup="true">
            <a href="/aprobarNomina" class="m-menu__link" title="">
              <i class="m-menu__link-icon flaticon-interface-10"></i>
              <span class="m-menu__link-text">APROBAR NOVEDADES</span>
            </a>
          </li>
						<a href="/liquidarNomina" class="m-menu__link " ><i class="m-menu__link-icon flaticon-edit-1"></i><span class="m-menu__link-text">NOMINA TODA LA EMPRESA</span></a>
					</li> --}}
          {{-- <li class="m-menu__item " aria-haspopup="true">
            <a href="/liquidarNominaSiesaTNL" class="m-menu__link "><i
                class="m-menu__link-icon flaticon-paper-plane-1"></i><span class="m-menu__link-text">TNL A
                SIESA</span></a>
          </li> --}}
          {{-- <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
            m-menu-link-redirect="1" aria-haspopup="true">
            <a href="/kardex" class="m-menu__link" title="">
              <i class="m-menu__link-icon flaticon-time"></i>
              <span class="m-menu__link-text">KARDEX HORAS</span>
            </a>
          </li> --}}
        </ul>
      </div>
    </li>
    @elseif(Auth::user()->cedula=='1088248488')
    <li class="m-menu__item m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click"
      m-menu-link-redirect="1" aria-haspopup="true">
      <a href="/editarMaraciones" class="m-menu__link" title="">
        <i class="m-menu__link-icon flaticon-calendar-with-a-clock-time-tools"></i>
        <span class="m-menu__link-text">MODIFICAR MARCACION HORARIOS</span>
      </a>
    </li>
    @endif
  </ul>
</div>
<!-- END: Horizontal Menu -->
