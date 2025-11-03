<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];

    /**
     * Услуги, подключенные к квартирам (многие-ко-многим)
     */
    public function flats()
    {
        return $this->belongsToMany(Flat::class, 'flat_service')
            ->withPivot('connected_at', 'is_active')
            ->withTimestamps();
    }
}
