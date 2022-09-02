<?php

namespace App\Http\Controllers;

use App\Call;
use App\Order;
use App\PointSale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
  public static function get_siesa()
  {
    set_time_limit(0);

    $now = Carbon::now('America/Bogota');
    // dd($now->subHour()->format('Y-m-d H:i:s'));
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://143.110.149.240/api/orders',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('date' => $now->subMinutes(30)->format('Y-m-d H:i:s')),
    ));

    $response = json_decode(curl_exec($curl), true);
    curl_close($curl);
    $tickets = $response['sales'];

    foreach ($tickets as $ticket) {
      $call = Order::where('ticket', $ticket['ticket'])->first();
      $point = PointSale::where('code', $ticket['pdv'])->first();

      if (!$call && $point) {
        $data['user_id'] = Auth::user() ? Auth::user()->id : 100;
        $data['point_sale_id'] = $point->id;
        $data['phone'] = $ticket['phone'] ? $ticket['phone'] : $ticket['phone2'];
        $data['phone_2'] = '';
        $data['customer'] = $ticket['customer'] ? $ticket['customer'] : $ticket['customer2'];
        $data['ticket'] = $ticket['ticket'];
        $data['amount'] = $ticket['amount'];
        $data['username'] = $ticket['username'];
        $data['siesa_date'] = explode('.', $ticket['siesa_date'])[0];
        $data['schedule_date'] = $ticket['delivery_date'] != '' ? substr(explode('.', $ticket['siesa_date'])[0], 0, 10) . ' ' . $ticket['delivery_date'] : null;
        $call = Order::create($data);
        dump($call);
      }
    }
  }

  public function v3()
  {
    return view('calls.v3');
  }

  public function avg()
  {
    $now = Carbon::now()->subMinutes(20);
    $points = PointSale::all();
    foreach ($points as $p) {
      $order_avg = (int) Order::where('point_sale_id', $p->id)->where('cooked_at', '>=', $now)->avg('cooking_time');
      if ($order_avg) {
        $response = Http::put('http://44.208.37.247:8080/api/places/' . $p->idPuntoVenta, ['place' => ['time' => $order_avg]]);
        // dd($response);
      }
      // dump($p->name . "----" . $order_avg);
    }
  }
}
