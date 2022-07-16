<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Booking;

class MyBookingController extends Controller
{
    public function index($id) //แสดงผลการจอง
  {
    $bookings = DB::table('bookings')
                ->where('user', '=', $id)
                ->get();
    return view('components.mybooking')->with('data',$bookings);
  }
}
