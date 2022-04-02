<?php

use App\CampaingType;
use App\Restaurant;
use App\Role;
use App\Service;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProyectSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Role::create(['id' => 1, 'name' => 'ADMINISTRADOR']);
    Role::create(['id' => 2, 'name' => 'LIDER']);
    Role::create(['id' => 3, 'name' => 'CAJERO/DESPACHADOR']);

    Restaurant::create(['id' => 1, 'name' => 'CALLE']);
    Restaurant::create(['id' => 2, 'name' => 'VENTANA']);
    Restaurant::create(['id' => 3, 'name' => 'COCINA OCULTA']);

    Service::create(['id' => 1, 'name' => 'AUTOSERVICIO']);
    Service::create(['id' => 2, 'name' => 'SERVICIO A LA MESA']);

    CampaingType::create(['id' => 1, 'name' => 'TURNERO']);
    CampaingType::create(['id' => 2, 'name' => 'DESPACHO']);
    CampaingType::create(['id' => 3, 'name' => 'FEEDBACK']);

    User::create(['role_id' => 1, 'id' => 1, 'name' => 'STEVE', 'dni' => '1088238181', 'email' => 'stevenky6@gmail.com', 'password' => Hash::make('123456'), 'active' => 1]);
    User::create(['role_id' => 1, 'id' => 2, 'name' => 'DANIEL RAMIREZ', 'dni' => '80032826', 'email' => 'innovacion@sayonara.co', 'password' => Hash::make('80032826'), 'active' => 1]);
  }
}
