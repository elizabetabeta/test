<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
      'tip', 'sistem', 'godina_izdanja',
      'boja', 'velicina','kapacitet_baterije',
      'memorija', 'RAM', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
