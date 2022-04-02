<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaingType extends Model
{
  protected $table = 'campaing_types';
  protected $fillable = ['name'];
}
