<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointSaleCampaing extends Model
{
  protected $table = 'point_sale_campaings';
  protected $fillable = ['campaing_id', 'point_sale_id', 'campaing_type_id', 'feedback'];

  public function campaing()
  {
    return $this->belongsTo('App\Campaing', 'campaing_id', 'id');
  }
  public function point_sale()
  {
    return $this->belongsTo('App\PointSale',  'point_sale_id', 'id');
  }
}
