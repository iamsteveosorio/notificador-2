<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaing extends Model
{
  protected $table = 'campaings';
  protected $fillable = ['campaing_type_id', 'name', 'callzi_id'];

  public function campaing_type()
  {
    return $this->belongsTo('App\CampaingType', 'campaing_type_id', 'id');
  }
}
