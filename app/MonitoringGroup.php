<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoringGroup extends Model
{
    protected $fillable = ['name', 'description', 'icon'];

    public function parameter() {
        return $this->hasMany(MonitoringParameter::class);
    }
}
