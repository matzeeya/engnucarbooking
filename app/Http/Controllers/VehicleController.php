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

  public function getType()
  {
    return $vTypes = DB::table('vehicle_type')
    ->select('id','name')
    ->get();
  }

  public function getBrand()
  {
    return $brands = DB::table('brand')
    ->select('id','name')
    ->get();
  }

  public function getDriver()
  {
    return $driver = DB::table('users')
    ->where('usr_type', '=', '3')
    ->select('id','name')
    ->get();
  }
}
