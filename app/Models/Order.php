<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [

        'user_name',
        'user_phone',
        'user_comment',
        'start_address',
        'start_late',
        'start_longe',
        'end_address',
        'end_late',
        'end_longe',
        'fee',
        'car_type',
        'distance',
        'status',
        'provider_id',
        'provider_name',
        'provider_phone',
        'last_late',
        'last_longe',
        'canceled_at',
        'end_at',
        'admin_comment',

    ];
}
