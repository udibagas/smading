<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $fillable = ['inventory_id', 'tanggal', 'catatan', 'keterangan'];

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }
}
