<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'code', 'description', 'position', 'ip_address',
        'web_access', 'username', 'password', 'ruang_id', 'gedung_id',
        'appliance_id', 'rak_id', 'snmp_version', 'snmp_community',
        'modbus_offset_start', 'modbus_offset_end', 'monitor'
    ];

    public function ruang() {
        return $this->belongsTo(Ruang::class);
    }

    public function gedung() {
        return $this->belongsTo(Gedung::class);
    }

    public function appliance() {
        return $this->belongsTo(Appliance::class);
    }
}
