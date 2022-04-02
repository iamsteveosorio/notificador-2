<?php

namespace App\Http\Controllers;

use App\Call;
use App\Campaing;
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


  public static function send_feedbacks()
  {
    set_time_limit(0);
    $feedbacks = Campaing::where('campaing_type_id', 3)->get()->toArray();
    $orders = Order::whereDate('siesa_date', Carbon::today())->whereNull('feedback_at')->where('delivered_at', '<=', Carbon::now()->subMinutes(60))->get();
    foreach ($orders as $order) {
      $feedback = $feedbacks[rand(0, count($feedbacks) - 1)];
      $campaing_callzi_id = $feedback['callzi_id'];
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
        $order->feedback_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
      }
    }
  }


  public function manual_call(Request $request)
  {
    $data = $request->all();
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
  }
}
