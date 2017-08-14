<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'kode_registrasi', 'skpd', 'pemilik', 'gedung_id', 'ruang_id', 'posisi',
        'koneksi_listrik', 'ip_address', 'koneksi_lan', 'merk', 'model', 'serial_number',
        'tanggal_penempatan', 'tanggal_ikatan_pengadaan', 'tanggal_berakhir_garansi',
        'tanggal_berakhir_sewa', 'nomor_ikatan_pengadaan', 'harga_pengadaan',
        'nama_kontak', 'nomor_kontak', 'fungsi', 'status_kepemilikan', 'kondisi',
        'negara_pembuat', 'keterangan', 'foto'
    ];

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    public function ruang() {
        return $this->belongsTo(Ruang::class);
    }
}
