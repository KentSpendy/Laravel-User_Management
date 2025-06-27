<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;    

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'verification_token',
        'email_verified_at',
        'avatar',
        'otp_code',
        'otp_expires_at',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
        'otp_code',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
    ];
}
