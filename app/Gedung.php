<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $fillable = ['name', 'code', 'description', 'jumlah_lantai'];

    public function ruang() {
        return $this->hasMany(Ruang::class);
    }

    public function pintu() {
        return $this->hasMany(Pintu::class);
    }

    public function rak() {
        return $this->hasMany(Rak::class);
    }

    public function sensor() {
        return $this->hasMany(Sensor::class);
    }

    public function denah() {
        return $this->hasMany(Denah::class);
    }
}
