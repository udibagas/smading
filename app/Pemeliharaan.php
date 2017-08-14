<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = [
        'inventory_id', 'biaya', 'pajak_biaya', 'jenis', 'ikatan_perjanjian',
        'tanggal_mulai', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_selanjutnya',
        'tanggal_berakhir_garansi', 'kondisi_setelah', 'catatan', 'foto'
    ];

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }
}
