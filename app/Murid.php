<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $fillable = ['tanggal_lahir','absen','profile','nama_lengkap','email','user_id'];
}
