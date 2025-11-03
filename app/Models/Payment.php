<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    // Связь: платеж принадлежит квартире
    public function flat()
    {
        return $this->belongsTo(Flat::class, 'id_flat');
    }

    // Связь: платеж принадлежит периоду
    public function period()
    {
        return $this->belongsTo(Period::class, 'id_period');
    }
}
