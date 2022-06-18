<?php

namespace App\Http\Controllers;

use App\Call;
use App\Campaing;
use App\Core\WhatsApp;
use App\Http\Utils\Callzi;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function delivered($id)
  {
    $order = Order::find($id);
    if (!$order->last_call()) {
      $order->cooked_at = Carbon::now();
    }
    $order->delivered_at = Carbon::now();
    $order->save();

    return response(['order' => $order], 200);
  }

  public function ready($id)
  {
    $order = Order::find($id);
    $order->cooked_at = Carbon::now();
    $order->save();

    return response(['order' => $order], 200);
  }

  public function call($id)
  {
    $order = Order::find($id);
    if (!$order->last_call()) {
      $order->cooked_at = Carbon::now();
      $order->save();
    }
    $campaing_callzi_id = $order->point_sale->turnero()->campaing->callzi_id;
    $phone = $order->phone;
    if ($phone != '') {
      $callzi = Callzi::call_phone($campaing_callzi_id, $phone);
      if ($callzi['status'] == 201) {
        $data['order_id'] = $order->id;
        $data['campaing_id'] = $campaing_callzi_id;
        $data['phone'] = $phone;
        $data['callzi_status'] = $callzi['contact']['status'];
        $data['order'] = config('callzi.' . $callzi['contact']['status'] . '_ORDER');
        $data['callzi_id'] = $callzi['contact']['id'];
        $data['attempts'] = 0;
        $call = Call::create($data);
      }
      return response(['callzi' => $callzi], 200);
    }
    return response(['order' => $order], 200);
  }

  public function send_notification($id)
  {
    $order = Order::find($id);
    $phone = $order->phone;

    $whatsapp = new WhatsApp;
    $_messages = array(
      "Hola {$order->customer}!
      </br></br>Soy SAYOBOT, el asistente virtual de SAYONARA, por ahora he aprendido a notificarte cuando tu pedido esta listo, en un futuro te ayudare con más cositas.
      </br></br>🏃🏻🏃🏼‍♀️ Ven corriendo, tu pedido esta listo y delicioso esperando por ti (:",
      "{$order->customer}, tu pedido esta triste 😭, ven rápido el 🏃🏻🏃🏼‍♀️",
    );
    $response = $whatsapp->send_message('57' . trim($phone), $_messages[$order->send_whatsapp]);

    if ($response) {
      $order->send_whatsapp = $order->send_whatsapp + 1;
      $order->save();
    }

    return response(['order' => $order], 200);
  }


  public function manual_call(Request $request)
  {
    $data = $request->all();
    if ($request->order_id) {
      $order = Order::find($data['order_id']);
      if ($order) {
        $order->phone = $data['phone'];
        if (!$order->last_call()) {
          $order->cooked_at = Carbon::now();
        }
        $order->save();
        $campaing_callzi_id = $order->point_sale->turnero()->campaing->callzi_id;
        $phone = $order->phone;
        if ($phone != '') {
          $callzi = Callzi::call_phone($campaing_callzi_id, $phone);
          if ($callzi && $callzi['status'] == 201) {
            $data['order_id'] = $order->id;
            $data['campaing_id'] = $campaing_callzi_id;
            $data['phone'] = $phone;
            $data['callzi_status'] = $callzi['contact']['status'];
            $data['order'] = config('callzi.' . $callzi['contact']['status'] . '_ORDER');
            $data['callzi_id'] = $callzi['contact']['id'];
            $data['attempts'] = 0;
            $call = Call::create($data);
          }
          return redirect()->back();
        }
        return redirect()->back();
      }
    } else {
      $callzi = Callzi::call_phone('26701',  $data['phone']);
      return redirect()->back();
    }
  }
}
