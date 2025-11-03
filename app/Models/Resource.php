<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;

    // Связь: один ресурс имеет много счетчиков
    public function counters()
    {
        return $this->hasMany(Counter::class, 'id_res');
    }
}
