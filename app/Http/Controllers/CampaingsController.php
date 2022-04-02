<?php

namespace App\Http\Controllers;

use App\Campaing;
use App\CampaingType;
use Illuminate\Http\Request;

class CampaingsController extends Controller
{
  public function index(Request $request)
  {
    $campaings = Campaing::all();
    return view('campaings.index', compact('campaings', 'request'));
  }

  public function create()
  {
    $types = CampaingType::all();
    return view('campaings.create', compact('types'));
  }

  public function save(Request $request)
  {
    $data = $request->all();
    Campaing::create($data);
    return redirect()->route('campaings');
  }

  public function edit($id)
  {
    $campaing = Campaing::find($id);
    $types = CampaingType::all();
    return view('campaings.edit', compact('campaing', 'types'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $campaing = Campaing::find($id);
    $campaing->update($data);
    return redirect()->route('campaings');
  }

  public function delete($id)
  {
    $campaing = Campaing::destroy($id);
    return redirect()->route('campaings');
  }
}
