<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $fillable = ['role_id', 'name', 'dni', 'email', 'email_verified_at', 'password', 'active'];

  public function role()
  {
    return $this->belongsTo('App\Role', 'role_id', 'id');
  }

  public function point_sale_users()
  {
    return $this->hasMany('App\PointSaleUser', 'user_id');
  }

  public function isAdmin()
  {
    if ($this->role_id == 14) {
      return true;
    }
    return false;
  }
}
