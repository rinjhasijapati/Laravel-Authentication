<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticable
{
    use HasFactory;

    protected $fillable = ['email', 'username', 'password'];
}