<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $fillable = [
        'gedung_id', 'ruang_id', 'rak_id',
        'monitoring_parameter_id', 'min_value', 'max_value'
    ];

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    public function ruang() {
        return $this->belongsTo(Ruang::class);
    }

    public function rak() {
        return $this->belongsTo(Rak::class);
    }

    public function monitoringParameter() {
        return $this->belongsTo(MonitoringParameter::class);
    }
}
