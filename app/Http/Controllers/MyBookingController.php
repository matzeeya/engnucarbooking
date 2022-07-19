<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Booking;

class MyBookingController extends Controller
{
    public function index($id) //แสดงผลการจอง
  {
    $approve = DB::table('bookings')
                ->join('vehicles','vehicles.id','=','bookings.vehicle_id')
                ->join('users','users.id','=','bookings.chauffeur')
                ->where('bookings.user', '=', $id)
                ->select('bookings.*','vehicles.photo','vehicles.vehicle_number','users.name')
                ->get();

    $bookings = DB::table('bookings')
                ->join('vehicle_type','vehicle_type.id','=','bookings.vehicle')
                ->where('bookings.user', '=', $id)
                ->select('bookings.*','vehicle_type.name')
                ->get();

    return view('components.mybooking')
    ->with('data',$bookings)
    ->with('approve',$approve);
  }
}
