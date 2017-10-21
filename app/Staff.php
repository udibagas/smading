<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'nama', 'jabatan', 'fp_id', 'card_id', 'template', 'uuid'
    ];
}
