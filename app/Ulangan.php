<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulangan extends Model
{
    protected $table = 'ulangan';
    protected $fillable = ['judul','isi','creator_id','editor_id','untuk_tanggal'];
}
