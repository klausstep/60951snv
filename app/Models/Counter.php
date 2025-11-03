<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counter extends Model
{
    use HasFactory;

    // Связь: счетчик принадлежит квартире
    public function flat()
    {
        return $this->belongsTo(Flat::class, 'id_flat');
    }

    // Связь: счетчик принадлежит ресурсу
    public function resource()
    {
        return $this->belongsTo(Resource::class, 'id_res');
    }

    // Связь: один счетчик имеет много показаний
    public function values()
    {
        return $this->hasMany(Value::class, 'id_counter');
    }
}
