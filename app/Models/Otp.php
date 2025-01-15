<?php

namespace App\Models;

use App\Models\Traits\Observable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    //use Observable;

    protected $fillable=[
        'user_id',
        'otp',
        'expired_at'
    ];
}
