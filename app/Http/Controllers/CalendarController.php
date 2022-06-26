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
    
    public function view($id)
    {
      $booking = Booking::find($id);
      if(! $booking) {
        return response()->json([
          'error' => 'Unable to locate the event'
        ], 404);
      }
      return $booking;
    }

    public function edit(Request $request ,$id)
    {
        $booking = Booking::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
          'chauffeur' => $request->chauffeur,
          'vehicle_id' => $request->vehicle_id,
          'status' => $request->status,
          'reason' => $request->reason,
          'approver' => $request->approver,
          'approver_date' => $request->approver_date,
        ]);
        return response()->json($booking);
    }
}
