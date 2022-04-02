<table id="calls-table" class="table text-center">
  <thead>
    <tr>
      <th>HORA</th>
      <th>FACTURA</th>
      <th>CLIENTE</th>
      <th>TELEFONO</th>
      <th>VALOR</th>
      <th>ESTADO</th>
      <th>INTENTO</th>
      <th colspan="2">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($last_calls as $call)
    <tr class="{{config('callzi.' .$call->callzi_status.'_COLOR')}}">
      <td>{{ $call->created_at->format('g:i A') }}</td>
      <td>{{$call->ticket?$call->ticket:''}}</td>
      <td>{{$call->customer?$call->customer:''}}</td>
      <td>{{$call->phone}}</td>
      <td>{{number_format($call->amount,0)}}</td>
      <td>{{config('callzi.'.$call->callzi_status)}}</td>
      <td>{{$call->attempts}}</td>
      <td>
        @if($call->callzi_status == 'CONTACTED' || $call->callzi_status == 'NOT_CONTACTED' || $call->callzi_status ==
        'TO_REDIAL')
        <form action="{{route('calls.call',['id'=>$campaing->id])}}" method="POST" style="display:inline">
          @csrf
          <input type="hidden" name="point_sale_id" value="{{$point_id}}">
          <input type="hidden" id="ppt" name="ppt" value="{{$campaing->callzi_id}}">
          <input type="hidden" name="phone" value="{{$call->phone}}">
          <input type="hidden" name="call_id" value="{{$call->id}}">
          <input type="submit" class="btn btn-primary btn-sm text-uppercase" value="REMARCAR">
        </form>
        @endif
        <a href="{{route('calls.end',['id'=>$call->id])}}">
          <button class="btn btn-warning btn-sm text-uppercase">
            {{$call->campaing->campaing_type_id == 1 ? 'ENTREGADO':'ARCHIVAR'}}</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>