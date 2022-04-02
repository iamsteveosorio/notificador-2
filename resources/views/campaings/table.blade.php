<table class="table m-table" width="100%">
  <thead>
    <tr>
      <th>TIPO</th>
      <th>NOMBRE</th>
      <th>CALLZI ID</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    @foreach($campaings as $item)
    <tr>
      <td>{{$item->campaing_type->name}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->callzi_id}}</td>
      <td>
        <a href="{{route('campaings.edit',['id'=>$item->id]) }}" title="Edit area"><button
            class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Editar</button></a>
        <form method="GET" action="{{ route('campaings.delete',['id'=>$item->id]) }}" accept-charset="UTF-8"
          style="display:inline">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger btn-sm text-uppercase" title="Delete parametro"
            onclick="return confirm(&quot;DESEA ELIMINAR ESTA CAMPANA?&quot;)"><i class="fa fa-trash-o"
              aria-hidden="true"></i>
            Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
