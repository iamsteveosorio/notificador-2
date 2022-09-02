<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointSale extends Model
{
  protected $table = 'point_sales';
  protected $fillable = ['city', 'code', 'name', 'address', 'service_id', 'restaurant_id', 'costumer_service', 'owner_delivery', 'platform_delivery', 'breakfast_sale', 'idPuntoVenta'];

  public function restaurant()
  {
    return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');
  }
  public function service()
  {
    return $this->belongsTo('App\Service', 'service_id', 'id');
  }

  public function point_sale_campaings()
  {
    return $this->hasMany('App\PointSaleCampaing', 'point_sale_id');
  }

  public function turnero()
  {
    return $this->hasMany('App\PointSaleCampaing', 'point_sale_id')->where('campaing_type_id', 1)->first();
  }

  public function despacho()
  {
    return $this->hasMany('App\PointSaleCampaing', 'point_sale_id')->where('campaing_type_id', 2)->first();
  }

  public function feedbacks()
  {
    return $this->hasMany('App\PointSaleCampaing', 'point_sale_id')->where('campaing_type_id', 3)->get();
  }
  public function point_sale_users()
  {
    return $this->hasMany('App\PointSaleUser', 'point_sale_id');
  }

  public function getTotalUsersAttribute()
  {
    return $this->hasMany('App\PointSaleUser', 'point_sale_id')->count();
  }
}
