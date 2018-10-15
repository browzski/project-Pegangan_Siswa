<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pr extends Model
{
    protected $table = 'pr';
    protected $fillable = ['judul','isi','creator_id','editor_id','untuk_tanggal'];
}
