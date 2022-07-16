<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index() //แสดงผลการจอง
  {
    $datas = DB::table('vehicles')
    ->join('vehicle_type', 'vehicle_type.id', '=', 'vehicles.vehicle_type')
    ->join('brand', 'brand.id', '=', 'vehicles.brand_id')
    ->join('users', 'users.id', '=', 'vehicles.responsible_man')
    ->select('vehicles.*', 'vehicle_type.name AS type', 'brand.name AS brand','users.name')
    ->get();

    return view('components.vehicle')->with('data',$datas);
  }
}
