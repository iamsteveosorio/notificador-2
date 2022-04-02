<?php

namespace App\Http\Traits;

use App\Empleado;
use App\Horario;
use App\PuntoVenta;
use Auth;

trait EmpleadosTrait
{
  public function getCalendarResourses($start = null, $end = null)
  {
    set_time_limit(0);
    $data = array();
    $puntoVentaAdmin = Auth::user()->puntosVentaAdmin();
    $horarios = Horario::whereBetween('fechaInicio', [$start, $end])->whereIn('idPuntoVenta', $puntoVentaAdmin)->whereHas('empleado', function ($query) {
      $query->where('activo', '=', 1);
    });
    if (Auth::user()->idCargo == 14) {
      $horarios = $horarios->whereHas('Empleado', function ($q) {
        $q->whereNotIn('idCargo', array(2, 12));
      })->get();
    } else {
      $horarios = $horarios->get();
    }
    // dd($horarios);
    $empleados  = Empleado::whereIn('idPuntoVenta', $puntoVentaAdmin)->where('activo', 1)->whereNotIn('idCargo', array(2, 12))->get();
    // dd($empleados);
    foreach ($empleados as $empleado) {
      $kLive = $empleado->getKardexLive();
      $resources[$empleado->idEmpleado . '_' . $empleado->idPuntoVenta] = array(
        'id' => $empleado->idEmpleado . '_' . $empleado->idPuntoVenta,
        'title' =>  isset($empleado->cinturon) ? $empleado->nombre . ' (' . $empleado->cinturon->nombre . ')' : $empleado->nombre,
        'cinturon' =>  isset($empleado->cinturon) ? '<span class="m-badge m-badge--' . $empleado->cinturon->codigo . '" style="box-sizing: border-box !important;"></span>' : '<span class="m-badge m-badge--metal' . '" style="box-sizing: border-box !important;"></span>',
        'puntoVenta' =>  $empleado->puntoVenta->nombre,
        'ultimoSaldo' => $kLive['ultimoSaldo'],
        'saldoHoras' => $kLive['horasTrabajadas'] - $kLive['horasTrabajar']
        // 'programadas' => (!empty($start)) ? (string)$empleado->totalHorasP($start, $end) : (string)$empleado->totalHorasP(),
        // 'trabajadas' => (!empty($start)) ? (string)$empleado->totalHorasT($start, $end) : (string)$empleado->totalHorasT()
      );
    }
    if (isset($horarios)) {
      foreach ($horarios as $horario) {
        $e = $horario->empleado;
        $ekLive = $e->getKardexLive();
        $resources[$horario->idEmpleado . '_' . $horario->idPuntoVenta] = array(
          'id' => $horario->idEmpleado . '_' . $horario->idPuntoVenta,
          'title' =>  isset($e->cinturon) ? $e->nombre . ' (' . $e->cinturon->nombre . ')' : $e->nombre,
          'cinturon' =>  isset($horario->empleado->cinturon) ? '<span class="m-badge m-badge--' . $e->cinturon->codigo . '" style="box-sizing: border-box !important;"></span>' : '<span class="m-badge m-badge--metal' . '" style="box-sizing: border-box !important;"></span>',
          'puntoVenta' =>  $horario->puntoVenta->nombre,
          'ultimoSaldo' => $ekLive['ultimoSaldo'],
          'saldoHoras' => $ekLive['horasTrabajadas'] - $kLive['horasTrabajar']
          // 'programadas' => (!empty($start)) ? (string)$e->totalHorasP($start, $end) : (string)$e->totalHorasP(),
          // 'trabajadas' => (!empty($start)) ? (string)$e->totalHorasT($start, $end) : (string)$e->totalHorasT()
        );
      }
    }
    foreach ($resources as $r) {
      $data[] = $r;
    }
    return $data;
  }

  public function getCalendarResoursesErika($start = null, $end = null)
  {
    $data = array();
    // $puntosVentaUser = Empleado::find(Auth::user()->idEmpleado)->empleadoPuntosVenta()->pluck('idPuntoVenta');
    $horarios = Horario::whereBetween('fechaInicio', [$start, $end])->whereHas('empleado', function ($query) {
      $query->where('activo', '=', 1);
    })->whereHas('Empleado', function ($q) {
      $q->whereIn('idCargo', array(2, 12));
      $q->orWhereIn('cedula', explode(',', env('CC_DOMICILIOS')));
    })->get();
    $empleados  = Empleado::where('activo', 1)->where(function ($q) {
      $q->whereIn('idCargo', array(2, 12, 22));
      $q->orWhereIn('cedula', explode(',', env('CC_DOMICILIOS')));
    })->get();
    foreach ($empleados as $empleado) {
      $data[] = array(
        'id' => $empleado->idEmpleado . '_' . $empleado->idPuntoVenta,
        'title' =>  isset($empleado->cinturon) ? $empleado->nombre . ' (' . $empleado->cinturon->nombre . ')' : $empleado->nombre,
        'cinturon' =>  isset($empleado->cinturon) ? '<span class="m-badge m-badge--' . $empleado->cinturon->codigo . '" style="box-sizing: border-box !important;"></span>' : '<span class="m-badge m-badge--metal' . '" style="box-sizing: border-box !important;"></span>',
        'puntoVenta' =>  $empleado->puntoVenta->nombre,
        'saldoHoras' => $empleado->getSaldoEmpleado(),
        'programadas' => (!empty($start)) ? (string)$empleado->totalHorasP($start, $end) : (string)$empleado->totalHorasP(),
        'trabajadas' => (!empty($start)) ? (string)$empleado->totalHorasT($start, $end) : (string)$empleado->totalHorasT()
      );
    }
    foreach ($horarios as $horario) {
      $data[] = array(
        'id' => $horario->idEmpleado . '_' . $horario->idPuntoVenta,
        'title' =>  isset($horario->empleado->cinturon) ? $horario->empleado->nombre . ' (' . $horario->empleado->cinturon->nombre . ')' : $horario->empleado->nombre,
        'cinturon' =>  isset($horario->empleado->cinturon) ? '<span class="m-badge m-badge--' . $horario->empleado->cinturon->codigo . '" style="box-sizing: border-box !important;"></span>' : '<span class="m-badge m-badge--metal' . '" style="box-sizing: border-box !important;"></span>',
        'puntoVenta' =>  $horario->puntoVenta->nombre,
        'saldoHoras' => $horario->empleado->getSaldoEmpleado(),
        'programadas' => (!empty($start)) ? (string)$horario->empleado->totalHorasP($start, $end) : (string)$horario->empleado->totalHorasP(),
        'trabajadas' => (!empty($start)) ? (string)$horario->empleado->totalHorasT($start, $end) : (string)$horario->empleado->totalHorasT()
      );
    }
    return $data;
  }
}
