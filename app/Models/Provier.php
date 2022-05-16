<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provier extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone',
        'car_model',
        'car_number',
        'late',
        'longe',
        'active',
        'blocked',
        'varified',
        'on_trip',
        'from',
        'image',
        'car_type',

    ];

}
