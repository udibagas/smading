<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SnmpOid extends Model
{
    protected $fillable = [
        'appliance_id', 'oid', 'description', 'conversion', 'substr_output',
        'unit', 'data_type', 'name', 'monitoring_parameter_id', 'monitor'
    ];

    public function appliance() {
        return $this->belongsTo(Appliance::class);
    }

    public function scopeIsMonitor($query) {
        return $query->where('monitor', 1);
    }
}
