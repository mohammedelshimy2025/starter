<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = "logins";
    protected $fillable = ['name', 'email', 'password','phone'];
    protected $timestamp = false;
}
