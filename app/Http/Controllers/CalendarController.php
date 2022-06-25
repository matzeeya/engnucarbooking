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
      $color = null;
      if($booking->status == 0) {
        $color = '#F88133';
      }else if($booking->status == 1){
        $color = '#12B604';
      }else{
        $color = '#D80038';
      }
      $events[] = [
        'id'   => $booking->id,
        'title' => $booking->title,
        'start' => $booking->start_date,
        'end' => $booking->end_date,
        'color' => $color
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

      $color = null;
      if($booking->status == 0) {
        $color = '#F88133';
      }else if($booking->status == 1){
        $color = '#12B604';
      }else{
        $color = '#D80038';
      }
      return response()->json([
        'id' => $booking->id,
        'start' => $booking->start_date,
        'end' => $booking->end_date,
        'title' => $booking->title,
        'color' => $color ? $color: '',
      ]);
    }
    
    public function show(Request $request ,$id)
    {
      $data = array();
      $booking = Booking::find($id);
      if(! $booking) {
        return response()->json([
          'error' => 'Unable to locate the event'
        ], 404);
      }
      foreach($booking as $obj) {
        $data[] = [
          'booking_number' => $obj->booking_number,
          'user' => $obj->username,
          'title' => $obj->title,
          'start_date' => $obj->start_date,
          'end_date' => $obj->end_date,
          'detail' => $obj->detail,
          'vehicle' => $obj->vehicle,
          'travelers' => $obj->travelers,
          'place' => $obj->place,
          'location' => $obj->location,
          'phone' => $obj->phone,
        ];
      }
      return response()->json($data);
    }
}
