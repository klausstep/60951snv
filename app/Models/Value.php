<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Value extends Model
{
    use HasFactory;

    // Связь: показание принадлежит счетчику
    public function counter()
    {
        return $this->belongsTo(Counter::class, 'id_counter');
    }

    // Связь: показание принадлежит периоду
    public function period()
    {
        return $this->belongsTo(Period::class, 'id_period');
    }
}
