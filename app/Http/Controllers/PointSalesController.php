<?php

namespace App\Http\Controllers;

use App\Campaing;
use App\PointSale;
use App\PointSaleCampaing;
use App\PointSaleUser;
use App\Restaurant;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class PointSalesController extends Controller
{
  public function index(Request $request)
  {
    $points = PointSale::all();
    return view('pointsales.index', compact('points', 'request'));
  }

  public function create()
  {
    $restaurants = Restaurant::all();
    $services = Service::all();
    return view('pointsales.create', compact('restaurants', 'services'));
  }

  public function save(Request $request)
  {
    $data = $request->all();
    PointSale::create($data);
    return redirect()->route('pointsales');
  }

  public function edit($id)
  {
    $point = PointSale::find($id);
    $restaurants = Restaurant::all();
    $services = Service::all();
    $turneros = Campaing::where('campaing_type_id', 1)->get();
    $despachos = Campaing::where('campaing_type_id', 2)->get();
    $feedbacks = Campaing::where('campaing_type_id', 3)->get();
    $users = User::all();
    return view('pointsales.edit', compact('point', 'restaurants', 'services', 'turneros', 'despachos', 'feedbacks', 'users'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $point = PointSale::find($id);
    $point->update($data);

    $turnero = $point->turnero() ? $point->turnero()->delete() : '';
    $despacho = $point->despacho() ? $point->despacho()->delete() : '';
    $despacho = $point->feedbacks() ?  PointSaleCampaing::where('point_sale_id', $id)->where('campaing_type_id', 3)->delete() : '';
    if ($data['turnero']) {
      PointSaleCampaing::create(['campaing_id' => $data['turnero'], 'point_sale_id' => $id, 'campaing_type_id' => 1]);
    }
    if ($data['despacho']) {
      PointSaleCampaing::create(['campaing_id' => $data['despacho'], 'point_sale_id' => $id, 'campaing_type_id' => 2]);
    }
    if (isset($data['feedbacks'])) {
      foreach ($data['feedbacks'] as $f) {
        if ($f['feedback'] != '') {
          PointSaleCampaing::create(['campaing_id' => $f['feedback'], 'point_sale_id' => $id, 'campaing_type_id' => 3]);
        }
      }
    }
    $despacho = $point->point_sale_users() ?  PointSaleUser::where('point_sale_id', $id)->delete() : '';
    if (isset($data['users'])) {
      foreach ($data['users'] as $f) {
        if ($f['user'] != '') {
          PointSaleUser::create(['user_id' => $f['user'], 'point_sale_id' => $id]);
        }
      }
    }
    return redirect()->route('pointsales');
  }

  public function delete($id)
  {
    $point = PointSale::destroy($id);
    return redirect()->route('pointsales');
  }
}
