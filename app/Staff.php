<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'nama', 'jabatan', 'card_id',
        'template', 'uuid', 'template1', 'active'
    ];

    protected $appends = ['akses'];

    public function pintu() {
        return $this->belongsToMany(Pintu::class, 'hak_akses');
    }

    public function getAksesAttribute() {
        $akses = [];
        foreach ($this->pintu as $p) {
            $akses[] = $p->name;
        }

        return implode(', ', $akses);
    }

}
