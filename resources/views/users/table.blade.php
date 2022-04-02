<table class="table m-table" width="100%">
  <thead>
    <tr>
      <th>ROL</th>
      <th>NOMBRE</th>
      <th>CEDULA</th>
      <th>CORREO</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    @foreach($points as $item)
    <tr>
      <td>{{$item->role->name}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->dni}}</td>
      <td>{{$item->email}}</td>
      <td>
        <a href="{{route('users.edit',['id'=>$item->id]) }}" title="Edit area"><button
            class="btn btn-primary btn-sm text-uppercase"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            Editar</button></a>
        <form method="GET" action="{{ route('users.delete',['id'=>$item->id]) }}" accept-charset="UTF-8"
          style="display:inline">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger btn-sm text-uppercase" title="Delete parametro"
            onclick="return confirm(&quot;DESEA ELIMINAR ESTE USUARIO?&quot;)"><i class="fa fa-trash-o"
              aria-hidden="true"></i>
            Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
