<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $fillable = [
        'name', 'code', 'description', 'ruang_id', 'gedung_id',
        'layout', 'dimensi', 'kapasitas', 
    ];

    public function ruang() {
        return $this->belongsTo(Ruang::class);
    }

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }
}
