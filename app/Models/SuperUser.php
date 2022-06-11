<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SuperUser extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
    protected $fillable = [

        'name',
        'email',
        'phone',

    ];
}
