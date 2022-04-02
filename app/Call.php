<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
  protected $table = 'calls';
  protected $primary = 'id';
  protected $fillable = ['order_id', 'campaing_id', 'phone', 'callzi_id', 'callzi_status', 'attempts', 'order'];

  public function campaing()
  {
    return $this->belongsTo('App\Campaing', 'campaing_id', 'id');
  }
  public function order()
  {
    return $this->belongsTo('App\Order',  'order_id', 'id');
  }
}
