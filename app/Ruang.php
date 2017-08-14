<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $fillable = [
        'name', 'code', 'description', 'gedung_id', 'lantai', 'layout',
    ];

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }
}
