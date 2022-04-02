<?php

namespace App\Http\Utils;

use App\Call;
use Illuminate\Support\Facades\Auth;

class Wompi
{
  public static function  get_status($id)
  {
    // CURLOPT_URL => 'https://sandbox.wompi.co/v1/transactions/' . $id,
    $call = null;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://production.wompi.co/v1/transactions/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $server_output = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($server_output, true);
    return $response;
  }
}
