<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    // dd($request);
    $user = Auth::user();
    return view('home', compact('user'));
  }


  public function expo(Request $request)
  {
    return redirect('https://sayonaracol.typeform.com/to/Egy9ZwAW');
  }


  public function promo(Request $request)
  {
    return redirect('https://sayonaracol.typeform.com/to/L4sVPWcR');
  }
}
