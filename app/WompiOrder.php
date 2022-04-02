<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WompiOrder extends Model
{
  protected $table = 'wompi_orders';
  protected $primary = 'id';
  protected $fillable = ['wompi_id', 'customer', 'phone', 'amount', 'cc', 'email', 'hour', 'payment_type', 'done', 'status'];
}
