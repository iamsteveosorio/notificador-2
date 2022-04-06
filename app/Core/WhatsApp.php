<?php

namespace App\Core;

use Illuminate\Support\Facades\Log;

class WhatsApp
{

    public $token;

    public function __construct()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sayonara.api-sender.ikono.im/v1/auth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'username=%40courier%3Asayonara.co&password=YDIRm6fYKUg12',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        $this->token  = $result ? $result['access_token'] : null;
    }

    public function send_message($phone_number, $message)
    {

        $token = $this->token;

        $curl = curl_init();

        $data['phone'] = $phone_number;
        $data['message'] = $message;

        Log::info("{$phone_number} - {$message}");

        // dd(json_encode($data));

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sayonara.api-sender.ikono.im/v1/message/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token,
                'Content-Type: text/plain'
            ),
        ));

        $response = curl_exec($curl);

        Log::info($response);



        curl_close($curl);
        return $response;
    }
}
