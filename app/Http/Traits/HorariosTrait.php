<?php
namespace App\Http\Traits;
use App\Empleado;
use App\Horario;
use App\PuntoVenta;
use Auth;
use Carbon\Carbon;

trait HorariosTrait {
    public function getHorarios($start=null,$end=null){
        $puntosVentaAdmin = Auth::user()->puntosVentaAdmin();
        $horarios = Horario::whereIn('idPuntoVenta',$puntosVentaAdmin)->whereBetween('fechaInicio', [$start, $end])->whereHas('TipoNovedad', function($q){
            $q->where('muestraCalendario',1);
        })->get();
        $nowDate = Carbon::now();
        $response = array();
        foreach($horarios as $horario){
            $eventDate = Carbon::createFromTimestamp(strtotime($horario->fechaInicio));
            $response[] = array(
                'id' => $horario->idHorario,
                'title' => $horario->abvTurno.' | '.date('H:i',strtotime($horario->fechaInicio)).' - '.date('H:i',strtotime($horario->fechaFin)),
                'description'=>  $horario->nombreTurno .' | '.date('H:i',strtotime($horario->fechaInicio)).' - '.date('H:i',strtotime($horario->fechaFin)),
                'start'=>  $horario->fechaInicio,
                'end'=>  $horario->fechaFin,
                'editable' => ($eventDate > $nowDate || !$horario->liquidada)? true:false,
                'resourceId' => $horario->idEmpleado.'_'.$horario->idPuntoVenta,
                'className'=>  $horario->activo && !$horario->liquidada?"m-fc-event--light m-fc-event--solid-".$horario->codigoColor:"m-fc-event--".$horario->codigoColor." m-fc-event--solid-metal"
            );
        }
        return $response;
    }

    public function getHorariosErika($start=null,$end=null){
        $horarios = Horario::whereBetween('fechaInicio', [$start, $end])->whereHas('TipoNovedad', function($q){
            $q->where('muestraCalendario',1);
        })->whereHas('Empleado', function($q){
            $q->whereIn('idCargo',array(2,12,22));
            $q->orWhereIn('cedula',explode(',', env('CC_DOMICILIOS')));
        })->get();
        $nowDate = Carbon::now();
        $response = array();
        foreach($horarios as $horario){
            $eventDate = Carbon::createFromTimestamp(strtotime($horario->fechaInicio));
            $response[] = array(
                'id' => $horario->idHorario,
                'title' => $horario->abvTurno.' | '.date('H:i',strtotime($horario->fechaInicio)).' - '.date('H:i',strtotime($horario->fechaFin)),
                'description'=>  $horario->nombreTurno .' | '.date('H:i',strtotime($horario->fechaInicio)).' - '.date('H:i',strtotime($horario->fechaFin)),
                'start'=>  $horario->fechaInicio,
                'end'=>  $horario->fechaFin,
                'editable' => ($eventDate > $nowDate || !$horario->liquidada)? true:false,
                'resourceId' => $horario->idEmpleado.'_'.$horario->idPuntoVenta,
                'className'=>  $horario->activo && !$horario->liquidada?"m-fc-event--light m-fc-event--solid-".$horario->codigoColor:"m-fc-event--".$horario->codigoColor." m-fc-event--solid-metal"
            );
        }
        return $response;
    }
}
