<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [


        'name',
        'namee',
        'kilo_price',
        'sec_price',
        'cap_ar',
        'cap_en',
        'dis_ar',
        'dis_en',
    ];
}
