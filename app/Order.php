<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $primary = 'id';
  protected $fillable = ['point_sale_id', 'user_id', 'ticket', 'customer', 'amount', 'phone', 'phone_2', 'feedback_at', 'siesa_date', 'delivered_at', 'cooked_at', 'schedule_at', 'username', 'send_whatsapp'];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
  public function point_sale()
  {
    return $this->belongsTo('App\PointSale',  'point_sale_id', 'id');
  }

  public function calls()
  {
    return $this->hasMany('App\Call', 'order_id');
  }

  public function last_call()
  {
    return $this->hasMany('App\Call', 'order_id')->latest()->first();
  }
}
