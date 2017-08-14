<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $fillable = ['name', 'code', 'description', 'jumlah_lantai'];
}
