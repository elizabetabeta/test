<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv', 'opis'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_type_id', 'id');
    }
}


