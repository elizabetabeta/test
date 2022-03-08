<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
      'tip', 'naziv','sistem', 'godina_izdanja',
      'boja', 'velicina','kapacitet_baterije',
      'memorija', 'RAM', 'kontakt', 'user_id', 'cijena', 'opis'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
