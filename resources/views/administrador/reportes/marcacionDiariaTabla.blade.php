@php use App\Http\Utils\Utils; @endphp
<table class="table m-table" width="100%">
    <thead>
        <tr>
           <th>EMPLEADO</th>
           <th>CARGO</th>
           <th>TIPO CONTRATO</th>
           <th>PUNTO VENTA</th>
           <th>FECHA</th>
           <th>HR INI PROG</th>
           <th>HR FIN PROG</th>
           <th>TOTAL HRS PROGRAMADAS</th>
           <th>HR INI MARC</th>
           <th>HR FIN MARC</th>
           <th>TOTAL HRS TRABAJADAS</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $e)
        @php $novedades = $e->horariosFechaInicio(Request::get('from')); @endphp
        @if(count($novedades)>0)
        @foreach($novedades as $n)
        <tr>
            <td>{{$e->nombre}}</td>
            <td>{{$e->cargo->nombre}}</td>
            <td>{{$e->tipoEmpleado->nombre}}</td>
            <td>{{$e->puntoVenta->nombre}}</td>
            <td>{{date('Y-m-d',strtotime($n->fechaInicio))}}</td>
            <td>{{Utils::getHorasPlano($n->horasProgramadas)>0?date('H:i',strtotime($n->fechaInicio)):''}}</td>
            <td>{{Utils::getHorasPlano($n->horasProgramadas)>0?date('H:i',strtotime($n->fechaFin)):''}}</td>
            <td>{{Utils::getHorasPlano($n->horasProgramadas)}}</td>
            <td>{{$n->marcacionInicio?date('H:i',strtotime($n->marcacionInicio)):''}}</td>
            <td>{{$n->marcacionFin?date('H:i',strtotime($n->marcacionFin)):''}}</td>
            <td>{{ Utils::getHorasPlano($n->horasTrabajadas)}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td>{{$e->nombre}}</td>
            <td>{{$e->cargo->nombre}}</td>
            <td>{{$e->tipoEmpleado->nombre}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
