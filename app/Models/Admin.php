<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard='admin';
    // use HasRoles;
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'address',
        'status',
        'image',
        'password',

    ];

    protected $hidden = [
        'password',

    ];

}
