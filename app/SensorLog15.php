<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorLog15 extends Model
{
    protected $fillable = [
        'sensor_id', 'min', 'max', 'tanggal', 'jam', 'monitoring_parameter_id', 'avg'
    ];

    public function sensor() {
        return $this->belongsTo(Sensor::class);
    }

    public function parameter() {
        return $this->belongsTo(MonitoringParameter::class);
    }
}
