<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_number',
        'numbers',
        'user',
        'title',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'detail',
        'vehicle',
        'travelers',
        'place',
        'location',
        'phone',
        'chauffeur',
        'vehicle_id',
        'status',
        'reason',
        'approver',
        'approved_date'
    ];
}
