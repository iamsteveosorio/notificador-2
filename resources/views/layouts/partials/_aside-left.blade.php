<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
    class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark ">
  <!-- BEGIN: Aside Menu -->
  <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
    m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
      <li class="m-menu__item" aria-haspopup="true">
        <a href="{{ route('programaciono') }}" class="m-menu__link ">
          <i class="m-menu__link-icon flaticon-calendar-1"></i>
          <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
              <span class="m-menu__link-text">Calendario</span>
            </span>
          </span>
        </a>
      </li>
      @if(in_array(Auth::user()->idCargo,array(3,1,4,10,9,8,20)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/turnos') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-time"></i>
          <span class="m-menu__link-text">Turnos</span>
        </a>
      </li>
      @endif
      <li class="m-menu__section ">
        <h4 class="m-menu__section-text">
          MAESTROS
        </h4>
        <i class="m-menu__section-icon flaticon-more-v2"></i>
      </li>
      @if(Auth::user()->idCargo==3)
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/parametros') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-interface-7"></i>
          <span class="m-menu__link-text">Parametros</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/tiposturno') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-layers"></i>
          <span class="m-menu__link-text">Tipos Turno</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,9,14,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/tiposnovedad') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-interface-7"></i>
          <span class="m-menu__link-text">Tipos Novedad</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(1,3,4,5,6,9,10,14,18,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/novedades') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-interface-7"></i>
          <span class="m-menu__link-text">Novedades</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/festivos') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-clock-2"></i>
          <span class="m-menu__link-text">Dias Festivos</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/tiposarea') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-layers"></i>
          <span class="m-menu__link-text">Tipos Area</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/areas') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-tabs"></i>
          <span class="m-menu__link-text">Areas</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/cargos') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-user"></i>
          <span class="m-menu__link-text">Cargos</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/centroscosto') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-share"></i>
          <span class="m-menu__link-text">Centros de Costo</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/etapas') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-graph"></i>
          <span class="m-menu__link-text">Etapas Empleado</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/cinturones') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-medal"></i>
          <span class="m-menu__link-text">Cinturones</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/tiposempleado') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-avatar"></i>
          <span class="m-menu__link-text">Tipos Empleado</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/empleados') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-users-1"></i>
          <span class="m-menu__link-text">Empleados</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(1,3,4,9,10,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/puntosventa') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-placeholder-1"></i>
          <span class="m-menu__link-text">Puntos de Venta</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,4,8,20,21)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/centrosoperacion') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-cogwheel-2"></i>
          <span class="m-menu__link-text">Centros de Operacion</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,8)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/departamentos') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-map-location"></i>
          <span class="m-menu__link-text">Departamentos</span>
        </a>
      </li>
      @endif
      @if(in_array(Auth::user()->idCargo,array(3,8)))
      <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="{{ url('/ciudades') }}" class="m-menu__link m-menu__toggle">
          <i class="m-menu__link-icon flaticon-map-location"></i>
          <span class="m-menu__link-text">Ciudades</span>
        </a>
      </li>
      @endif
    </ul>
  </div>
  <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->
