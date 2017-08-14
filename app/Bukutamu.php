<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukutamu extends Model
{
    protected $fillable = ['nama', 'instansi', 'jabatan', 'tujuan', 'masuk', 'keluar'];
}
