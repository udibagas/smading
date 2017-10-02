<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pintu extends Model
{
    protected $fillable = [
        'gedung_id', 'lantai', 'ruang_id',
        'code', 'name', 'description',
        'ip_address', 'username', 'password',
    ];

    protected $dates = ['last_access_time'];

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    public function ruang() {
        return $this->belongsTo(Ruang::class);
    }
}
