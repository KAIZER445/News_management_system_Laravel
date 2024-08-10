<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'username',
        'email',
        'password',
        'gender',
        'role',
        'image'
    ];
}
