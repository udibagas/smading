<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModbusRegister extends Model
{
    protected $fillable = [
        'appliance_id', 'offset', 'description', 'conversion',
        'unit', 'data_type', 'monitoring_parameter_id', 'monitor'
    ];

    public function appliance() {
        return $this->belongsTo(Appliance::class);
    }

    public function scopeIsMonitor($query) {
        return $query->where('monitor', 1);
    }
}
