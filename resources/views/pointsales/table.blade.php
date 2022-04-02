<table class="table m-table" width="100%">
  <thead>
    <tr>
      <th>CIUDAD</th>
      <th>NOMBRE</th>
      <th>DIRECCION</th>
      <th>TIPO SERVICIO</th>
      <th>TIPO RESTAURANTE</th>
      <th>SERVICIO AL CLIENTE</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    @foreach($points as $item)
    <tr>
      <td>{{$item->city}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->address}}</td>
      <td>{{$item->service->name}}</td>
      <td>{{$item->restaurant->name}}</td>
      <td>{{$item->costumer_service?'SI':'NO'}}</td>
      <td>
        <a href="{{route('pointsales.edit',['id'=>$item->id]) }}" title="Edit area"><button
            class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Editar</button></a>
        <form method="GET" action="{{ route('pointsales.delete',['id'=>$item->id]) }}" accept-charset="UTF-8"
          style="display:inline">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger btn-sm text-uppercase" title="Delete parametro"
            onclick="return confirm(&quot;DESEA ELIMINAR ESTE PUNTO DE VENTA?&quot;)"><i class="fa fa-trash-o"
              aria-hidden="true"></i>
            Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
