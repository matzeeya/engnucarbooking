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

  public function getCar()
  {
    return $car = DB::table('vehicles')
    //->where('vehicle_type', '=', $type)
    ->select('id','vehicle_number')
    ->get();
  }

  public function getProvince()
  {
    return $provinces = DB::table('provinces')
    ->select('id','name')
    ->get();
  }

  public function store(Request $request) //เพิ่มรายการจอง
    {
      $vehicle = Vehicle::create([
        'vehicle_number' => $request->vehicle_number,
        'vehicle_province' => $request->vehicle_province,
        'status' => $request->status,
        'vehicle_type' => $request->vehicle_type,
        'brand_id' => $request->brand_id,
        'model' => $request->model,
        'color' => $request->color,
        'fuel' => $request->fuel,
        'serial_number' => $request->serial_number,
        'serial_body' => $request->serial_body,
        'price' => $request->price,
        'date_buy' => $request->date_buy,
        'date_input' => $request->date_input,
        'date_register' => $request->date_register,
        'expire_register' => $request->expire_register,
        'responsible_man' => $request->responsible_man,
      ]);

      return $vehicle;
    }
}
