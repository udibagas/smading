<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringParameter extends Model
{
    protected $fillable = [
        'name', 'description', 'unit', 'monitoring_group_id',
        'min_value', 'max_value'
    ];

    public function monitoringGroup() {
        return $this->belongsTo(MonitoringGroup::class);
    }

    public function monitoring() {
        return $this->hasMany(Monitoring::class);
    }
}
