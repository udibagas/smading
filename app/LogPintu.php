<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPintu extends Model
{
    protected $fillable = [
        'pintu_id', 'status', 'access_by'
    ];

    public function pintu() {
        return $this->belongsTo(Pintu::class);
    }
}
