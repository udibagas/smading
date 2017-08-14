<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    protected $fillable = ['name', 'description', 'manufacturer', 'protocol'];

    public function modbusRegister() {
        return $this->hasMany(ModbusRegister::class);
    }

    public function snmpOid() {
        return $this->hasMany(SnmpOid::class);
    }

    public function sensor() {
        return $this->hasMany(Sensor::class);
    }
}
