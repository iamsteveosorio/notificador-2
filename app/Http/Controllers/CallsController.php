<?php

namespace App\Http\Controllers;

use App\Call;
use App\Campaing;
use App\Core\WhatsApp;
use App\Http\Utils\Callzi;
use App\Http\Utils\Utils;
use App\Order;
use App\PointSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CallsController extends Controller
{
  public function index($type_id)
  {
    $points = PointSale::whereHas('point_sale_campaings', function ($q) use ($type_id) {
      $q->where('campaing_type_id', $type_id);
    })->whereHas('point_sale_users', function ($q) {
      $q->where('user_id', Auth::user()->id);
    })->get();
    return view('calls.index', compact('points', 'type_id'));
  }

  public function campaing($point_id, $id)
  {
    $campaing = Campaing::find($id);
    $point = PointSale::find($point_id);
    // $last_calls = Call::where('point_sale_id', $point_id)->where('campaing_id', $id)->whereDate('created_at', Carbon::today())->where('finished', 0)->get();
    return view('calls.campaing', compact('point_id', 'campaing', 'point'));
  }

  public function call(Request $request, $id)
  {
    $campaing = Campaing::find($id);
    $data = $request->all();

    $call = Callzi::call_phone($data['point_sale_id'], $campaing, $data['phone']);
    // dump($request);
    if ($call) {
      if ($call->callzi_id) {
        $remove_call = Call::find($request->call_id);
        if ($remove_call) {
          $call->customer = $remove_call->customer ? $remove_call->customer : '';
          $call->ticket = $remove_call->ticket ? $remove_call->ticket : '';
          $call->amount =  $remove_call->amount ? $remove_call->amount : 0;
          $call->phone_2 = $remove_call->phone_2 ? $remove_call->phone_2 : '';
          $call->siesa_date = $remove_call->siesa_date ? $remove_call->siesa_date : '';
          $call->save();
        }

        Call::destroy($request->call_id);
      }
      return Redirect::route('calls.campaing', array('point_id' => $data['point_sale_id'], 'id' => $campaing->id));
    } else {
      return Redirect::route('calls.campaing', array('point_id' => $data['point_sale_id'], 'id' => $campaing->id));
      // ($response);
    }
  }


  public function send_notification(Request $request, $id)
  {
    $campaing = Campaing::find($id);
    $data = $request->all();

    $whatsapp = new WhatsApp;
    $response = $whatsapp->send_message('57' . trim($data['phone']), 'message');

    return Redirect::route('calls.campaing', array('point_id' => $data['point_sale_id'], 'id' => $campaing->id));
  }


  public function update_calls($point_id, $campaing_id)
  {
    $campaing = Campaing::find($campaing_id);
    $last_calls = Call::where('point_sale_id', $point_id)->where('campaing_id', $campaing_id)->whereDate('created_at', Carbon::today())->where('finished', 0)->where(function ($q) {
      $q->whereNotNull('callzi_id');
      $q->where('callzi_id', '!=', '');
    })->get();
    $now = Carbon::now();
    foreach ($last_calls as $call) {
      $response = Callzi::get_status($campaing->callzi_id, $call->callzi_id);
      $call->callzi_status = $response['status'];
      $call->order = config('callzi.' . $response['status'] . '_ORDER');
      if ($response['status'] == 'CONTACTED') {
        $call->attempts = 3;
        if ($call->campaing->campaing_type_id == 2) {
          $call->finished = 1;
        }
      }
      if ($now->diffInMinutes($call->created_at) > 15) {
        $call->finished = 1;
      }
      $call->save();
      if (($response['status'] == 'CONTACTED' || $call->callzi_status == 'NOT_CONTACTED'  || $call->callzi_status == 'TO_REDIAL') && $call->attempts < 3 && $call->finished == 0) {
        $newCall = Callzi::call_phone($call->point_sale_id, $campaing, $call->phone, $call->attempts + 1);
        if ($newCall->callzi_id) {
          $newCall->customer = $call->customer ? $call->customer : '';
          $newCall->ticket = $call->ticket ? $call->ticket : '';
          $newCall->amount =  $call->amount ? $call->amount : 0;
          $newCall->phone_2 = $call->phone_2 ? $call->phone_2 : '';
          $newCall->siesa_date = $call->siesa_date ? $call->siesa_date : '';
          $newCall->save();
          Call::destroy($call->id);
        }
      }
    }
  }


  public function grid($point_id, $id)
  {
    $this->update_calls($point_id, $id);
    $campaing = Campaing::find($id);
    $query = Call::where('point_sale_id', $point_id)->where(function ($q) {
      $q->whereNotNull('callzi_id');
      $q->where('callzi_id', '!=', '');
    })->where('campaing_id', $id)->whereDate('created_at', Carbon::today())
      ->where('finished', 0);
    if (request('keyword') != '') {
      $query->where('phone', 'like', "%" . request('keyword') . "%");
    }
    $query->orderBy('order', 'DESC')->orderBy('created_at', 'DESC');
    $last_calls = $query->get();

    return view('calls.table', compact('point_id', 'campaing', 'last_calls'));
  }

  public function end($id)
  {
    $call = Call::find($id);
    $call->finished = 1;
    $call->save();
    return Redirect::route('calls.campaing', array('point_id' => $call->point_sale_id, 'id' => $call->campaing_id));
  }


  public function new_calls_grid($point_id, $id)
  {
    $query = Order::where('point_sale_id', $point_id)
      ->where('siesa_date', '>', Carbon::now()->subMinutes(15))
      ->whereNull('delivered_at');
    if (request('keyword') != '') {
      $query->where('phone', 'like', "%" . request('keyword') . "%");
      $query->orWhere('customer', 'like', "%" . request('keyword') . "%");
      $query->orWhere('ticket', 'like', "%" . request('keyword') . "%");
    }
    // $query->orderBy('siesa_date', 'ASC');
    $orders = $query->get();
    $campaing = Campaing::find($id);
    foreach ($orders as $order) {
      $this->update_order_call($order, $campaing);
    }

    return view('calls.table-pedidos', compact('point_id', 'orders'));
  }


  public function update_order_call($order, $campaing)
  {
    $last_call =  $order->last_call();
    if ($last_call) {
      $response = Callzi::get_status($campaing->callzi_id,  $last_call->callzi_id);
      if ($response) {
        $last_call->callzi_status = $response['status'];
        $last_call->order = config('callzi.' . $response['status'] . '_ORDER');
        $last_call->save();
      }
      // RE CALL
      if (($last_call->callzi_status == 'NOT_CONTACTED'  || $last_call->callzi_status == 'TO_REDIAL') && count($order->calls) < 3 && $order->delivered_at == null) {
        $callzi = Callzi::call_phone($campaing->callzi_id, $order->phone);
        if ($callzi['status'] == 201) {
          $data['order_id'] = $order->id;
          $data['campaing_id'] = $campaing->callzi_id;
          $data['phone'] =  $order->phone;
          $data['callzi_status'] = $callzi['contact']['status'];
          $data['order'] = config('callzi.' . $callzi['contact']['status'] . '_ORDER');
          $data['callzi_id'] = $callzi['contact']['id'];
          $data['attempts'] = 0;
          $call = Call::create($data);
        }
      }
    }
  }
}
