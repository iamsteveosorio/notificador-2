<?php

namespace App\Http\Models;

use App\Call;
use App\Order;
use App\Turno;
use Carbon\Carbon;

class ReporteModel
{

  public static function get_orders($filters = array(), $paginate = 20)
  {
    $sql = Order::query();
    if (isset($filters['from'])) {
      $sql->whereDate('created_at', '>=', $filters['from']);
    }
    if (isset($filters['to'])) {
      $sql->whereDate('created_at', '<=', $filters['to']);
    }
    // if (isset($filters['campaing_type_id'])) {
    //   $sql->whereHas('campaing', function ($q) use ($filters) {
    //     $q->where('campaing_type_id', $filters['campaing_type_id']);
    //   });
    // }
    if (isset($filters['point_sale_id'])) {
      $sql->where('point_sale_id', '=', $filters['point_sale_id']);
    }
    $sql->orderBy('created_at');
    return $paginate ? $sql->paginate($paginate) : $sql->get();
  }

  public static function get_feedback_orders($filters = array(), $paginate = 20)
  {
    $sql = Order::query();
    if (isset($filters['from'])) {
      $sql->whereDate('created_at', '>=', $filters['from']);
    }
    if (isset($filters['to'])) {
      $sql->whereDate('created_at', '<=', $filters['to']);
    }
    if (isset($filters['point_sale_id'])) {
      $sql->where('point_sale_id', '=', $filters['point_sale_id']);
    }
    $sql->whereHas('calls', function ($q) {
      $q->whereHas('campaing', function ($q1) {
        $q1->where('campaing_type_id', 3);
      });
    });
    $sql->orderBy('created_at');
    return $paginate ? $sql->paginate($paginate) : $sql->get();
  }
}
