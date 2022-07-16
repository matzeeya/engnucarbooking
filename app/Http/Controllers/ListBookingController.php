<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ListBookingController extends Controller
{
    public function index() //แสดงผลการจอง
  {
    $bookings = Booking::all();
    //return $bookings;
    return view('components.booking')->with('data',$bookings);
  }
}
