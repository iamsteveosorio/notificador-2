<?php

namespace App\Http\Utils;

use App\Call;
use App\PointSaleCampaing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Utils
{
  public static function  get_point_feedback($point_sale_id, $phone)
  {
    $last_feedback = Call::whereHas('campaing', function ($q) {
      $q->where('campaing_type_id', 3);
    })->where('point_sale_id', $point_sale_id)->where('phone', $phone)->latest()->first();
    $feedback_campaing = null;
    if ($last_feedback) {
      $feedback_campaing = PointSaleCampaing::where('point_sale_id', $point_sale_id)->where('campaing_type_id', 3)->where('campaing_id', '!=', $last_feedback->campaing_id)->first();
    }
    if (!$feedback_campaing) {
      $feedback_campaing = PointSaleCampaing::where('point_sale_id', $point_sale_id)->where('campaing_type_id', 3)->first();
    }
    return $feedback_campaing;
  }
}
