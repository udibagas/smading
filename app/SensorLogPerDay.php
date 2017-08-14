<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorLogPerDay extends Model
{
    protected $fillable = [
        'sensor_id', 'min', 'max', 'tanggal', 'monitoring_parameter_id', 'avg'
    ];

    public function sensor() {
        return $this->belongsTo(Sensor::class);
    }

    public function parameter() {
        return $this->belongsTo(MonitoringParameter::class);
    }
}
