<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    //protected $guarded = [];

    protected $fillable = [
      'device_type_id', 'naziv', 'sistem', 'godina_izdanja',
      'boja', 'velicina','kapacitet_baterije',
      'memorija', 'RAM', 'kontakt', 'user_id', 'cijena',
      'image', 'opis', 'location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->hasOne(DeviceType::class, 'id', 'device_type_id');
    }

}
