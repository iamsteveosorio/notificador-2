<?php

namespace App\Http\Utils;

use App\Call;
use Illuminate\Support\Facades\Auth;

class Callzi
{
  public static function  call_phone($campaing, $phone)
  {
    $call = null;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://cloud.callzi.com/api/campaign/' . $campaing . '/contact/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('phone' => $phone),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic ' . base64_encode(env('CALLZI_USERNAME') . ":" . env('CALLZI_PASSWORD'))
      ),
    ));
    $server_output = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($server_output, true);
    return $response;
  }

  public static function get_status($campaing_id, $callzi_id)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://cloud.callzi.com/api/campaign/' . $campaing_id  . '/contact/id/' . $callzi_id . '/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic ' . base64_encode(env('CALLZI_USERNAME') . ":" . env('CALLZI_PASSWORD'))
      ),
    ));
    $server_output = curl_exec($curl);
    curl_close($curl);
    return json_decode($server_output, true);
  }
}
