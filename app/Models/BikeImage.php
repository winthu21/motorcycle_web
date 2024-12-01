<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeImage extends Model
{
    //
    protected $fillable = [
        'bike_id',
        'front_image',
        'left_image',
        'right_image',
        'back_image',
        'top_image',
    ];
}
