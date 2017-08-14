<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $fillable = ['nomor', 'judul', 'isi', 'gambar', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
