<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Provier extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

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
        'city',
        'birthday',
        'local_id_number',
        'local_id_image_front',
        'local_id_image_back',
        'local_id_ex',
        'license_number',
        'license_image',
        'license_ex',
        'vehicle_ownership_number',
        'vehicle_ownership_ex',
        'vehicle_ownership_image',
    ];

}
