<?php

namespace App\Http\Controllers;

use App\Http\Utils\Wompi;
use App\WompiOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WompiController extends Controller
{
  public function index(Request $request, $id = null)
  {
    $again = null;
    if ($id) {
      $wompi_order = WompiOrder::find($id);
      $again = 1;
    } else {
      $hour = $request->franjaHorario;
      // if ($request->horaManana != '_____') {
      //   $hour = $request->horaManana;
      // } elseif ($request->horaAlmuerzo != '_____') {
      //   $hour = $request->horaAlmuerzo;
      // } elseif ($request->horaTarde != '_____') {
      //   $hour = $request->horaTarde;
      // } elseif ($request->horaNoche != '_____') {
      //   $hour = $request->horaNoche;
      // }

      $wompi_order = WompiOrder::create(['customer' => $request->clientName, 'phone' => str_replace(' ', '', $request->phone), 'amount' => $request->amount, 'cc' => $request->cc, 'email' => $request->mail, 'hour' => $hour, 'payment_type' => $request->payment_type ? $request->payment_type : 'wompi']);
    }
    return view('wompi', compact('request', 'wompi_order', 'again'));
  }

  public function webhook(Request $request)
  {
    Log::info(json_encode($request->all()));
  }

  public function wompi_feedback(Request $request)
  {

    $wompi_response = Wompi::get_status($request->id);
    $id = explode('-', $wompi_response['data']['reference'])[2];
    $wompi_order = WompiOrder::find($id);
    if ($wompi_order) {
      $wompi_order->wompi_id = $request->id;
      $wompi_order->status = $wompi_response['data']['status'];
      $wompi_order->save();
    }
    if ($wompi_response['data']['status'] == 'APPROVED') {
      return view('wompi_feedback', compact('request', 'wompi_order'));
    } else {
      return $this->index($request, $id);
    }
  }
}
