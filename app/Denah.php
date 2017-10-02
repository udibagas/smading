<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denah extends Model
{
    protected $fillable = ['gedung_id', 'lantai', 'gambar'];

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }
}
