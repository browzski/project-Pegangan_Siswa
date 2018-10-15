<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'users';
    protected $fillable = ['username','nama_lengkap','password','email','role','gambar','biodata','background','cookie','token','verified'];
}
