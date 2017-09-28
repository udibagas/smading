<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplianceHttpApi extends Model
{
    protected $fillable = [
        'appliance_id', 'monitoring_parameter_id', 'url', 'description',
        'unit', 'data_type', 'monitor'
    ];

    public function appliance() {
        return $this->belongsTo(Appliance::class);
    }

    public function scopeIsMonitor($query) {
        return $query->where('monitor', 1);
    }

}
