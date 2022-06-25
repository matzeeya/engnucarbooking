<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_number',
        'user',
        'title', 
        'start_date', 
        'end_date',
        'detail',
        'vehicle',
        'travelers',
        'place',
        'location',
        'phone'
    ];
}
