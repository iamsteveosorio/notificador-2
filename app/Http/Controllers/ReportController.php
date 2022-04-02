<?php

namespace App\Http\Controllers;

use App\CampaingType;
use App\Exports\HorarioExport;
use App\Http\Models\ReporteModel;
use App\Order;
use App\PointSale;
use App\WompiOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
  public function index(Request $request)
  {
    ini_set('max_execution_time', 0);
    $points = PointSale::all();
    $types = CampaingType::all();
    $paginate = $request->download ? null : 20;
    $wompi_orders = $request->showReport ? ReporteModel::get_orders($request->all(), $paginate) : array();
    // dd($wompi_orders);
    if ($request->download) {
      $view = view('reports.table', compact('request', 'wompi_orders'));
      return Excel::download(new HorarioExport($view), 'report.xlsx');
    } else {
      return view('reports.index', compact('request', 'wompi_orders', 'points', 'types'));
    }
  }

  public function feedbacks(Request $request)
  {
    ini_set('max_execution_time', 0);
    $points = PointSale::all();
    $types = CampaingType::all();
    $paginate = $request->download ? null : 20;
    $wompi_orders = $request->showReport ? ReporteModel::get_feedback_orders($request->all(), $paginate) : array();
    // dd($wompi_orders);
    if ($request->download) {
      $view = view('reports.feedback_table', compact('request', 'wompi_orders'));
      return Excel::download(new HorarioExport($view), 'report.xlsx');
    } else {
      return view('reports.feedback_index', compact('request', 'wompi_orders', 'points', 'types'));
    }
  }
}
