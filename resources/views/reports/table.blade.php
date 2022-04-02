<table class="table" id="html_table" width="100%">
  <thead>
    <tr>
      <th>TICKET</th>
      <th>NOMBRE DEL CLIENTE</th>
      <th>TELEFONO DEL CLIENTE</th>
      <th>CAJERO</th>
      <th>VALOR DEL PEDIDO</th>
      <th>FECHA PEDIDO</th>
      <th>HORA PEDIDO</th>
      <th>TIEMPO EN COCINA</th>
      <th>TIEMPO ENTREGA</th>
    </tr>
  </thead>
  <tbody>
    @foreach($wompi_orders as $order)
    @php
    $pedido = \Carbon\Carbon::parse($order->siesa_date);
    $cooked = $order->cooked_at ? \Carbon\Carbon::parse($order->cooked_at) : null;
    $delivered =$order->delivered_at? \Carbon\Carbon::parse($order->delivered_at):null;
    @endphp
    <tr class="">
      <td>{{$order->ticket}}</td>
      <td>{{$order->customer}}</td>
      <td>{{$order->phone}}</td>
      <td>{{$order->username??''}}</td>
      <td>${{number_format($order->amount,0)}}</td>
      <td>{{date('Y-m-d', strtotime($order->siesa_date))}}</td>
      <td>{{date('H:i a', strtotime($order->siesa_date))}}</td>
      <td>{{$order->cooked_at ?$pedido->diffInRealMinutes($cooked):''}}</td>
      <td>{{$order->delivered_at && $order->cooked_at? $cooked->diffInRealMinutes($delivered):''}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
