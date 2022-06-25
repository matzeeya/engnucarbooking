<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
  public function index() //แสดงผลการจอง
  {
    $events = array();
    $bookings = Booking::all(); 
    foreach($bookings as $booking) {
      $events[] = [
        'id'   => $booking->id,
        'title' => $booking->title,
        'start' => $booking->start_date,
        'end' => $booking->end_date,
      ];
    }
    //return $events;
    //return view('calendar.index', ['events' => $events]);
    return view('pages.back-end.home', ['events' => $events]);
  }

  public function store(Request $request) //เพิ่มรายการจอง
    {
      //return $request->all();
      $request->validate([
        'title' => 'required|string'
      ]);
      
      $booking = Booking::create([
        'booking_number' => $request->booking_number,
        'user' => $request->username,
        'title' => $request->title,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'detail' => $request->detail,
        'vehicle' => $request->vehicle,
        'travelers' => $request->travelers,
        'place' => $request->place,
        'location' => $request->location,
        'phone' => $request->phone,
      ]);

      return response()->json([
        'id' => $booking->id,
        'start' => $booking->start_date,
        'end' => $booking->end_date,
        'title' => $booking->title,
      ]);
    }
}
