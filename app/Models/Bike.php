<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    //
    protected $fillable = [
        'bike_name',
        'bike_image',
        'brand_id',
        'category_id',
        'engine_power',
        'model_year_from',
        'model_year_to',
        'bike_code_name',
        'hp_torque',
        'front_brake',
        'rear_brake',
        'wheel_size',
        'fuel_system',
        'suspension_front',
        'suspension_rear',
        'chain_type',
        'swing_arm',
        'display',
        'headlight',
        'frame',
        'chassis',
        'weight',
        'starter',
        'speed',
    ];
}
