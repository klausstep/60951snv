<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Period extends Model
{
    use HasFactory;

    // Связь: один период имеет много показаний
    public function values()
    {
        return $this->hasMany(Value::class, 'id_period');
    }

    // Связь: один период имеет много платежей
    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_period');
    }
}
