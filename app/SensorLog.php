<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    protected $fillable = ['sensor_id', 'monitoring_parameter_id', 'value'];

    public function sensor() {
        return $this->belongsTo(Sensor::class);
    }

    public function parameter() {
        return $this->belongsTo(MonitoringParameter::class);
    }
}
