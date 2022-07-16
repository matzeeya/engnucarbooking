<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleType;
use App\Models\VehicleBrand;
use App\Models\User;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'vehicle_number',
        'vehicle_province',
        'status', 
        'vehicle_type', 
        'brand_id', 
        'model',
        'color',
        'fuel',
        'serial_number',
        'serial_body',
        'price',
        'seat',
        'date_buy',
        'date_input',
        'date_register',
        'expire_register',
        'responsible_man',
        'photo'
    ];
}
