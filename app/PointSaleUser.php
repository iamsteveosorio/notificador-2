<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointSaleUser extends Model
{

  protected $table = 'point_sale_users';
  protected $fillable = ['point_sale_id', 'user_id'];

  public function point_sale()
  {
    return $this->belongsTo('App\PointSale', 'id', 'point_sale_id');
  }
  public function user()
  {
    return $this->belongsTo('App\User', 'id', 'user_id');
  }
}
