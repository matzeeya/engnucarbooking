<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListBookingController extends Controller
{
    public function index() //แสดงผลการจอง
  {
    $bookings = DB::table('bookings')
    ->join('vehicles','vehicles.id','=','bookings.vehicle_id')
    ->join('users','users.id','=','bookings.chauffeur')
    ->select('bookings.*','vehicles.photo','vehicles.vehicle_number','users.name')
    ->get();

    return view('components.booking')->with('data',$bookings);
  }
}
