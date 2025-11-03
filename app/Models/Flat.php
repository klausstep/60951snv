<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = ['id_house', 'area', 'residents', 'number'];

    public function house()
    {
        return $this->belongsTo(House::class, 'id_house');
    }

    public function counters()
    {
        return $this->hasMany(Counter::class, 'id_flat');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id_flat');
    }

    /**
     * Услуги, подключенные к квартире (многие-ко-многим)
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'flat_service')
            ->withPivot('connected_at', 'is_active')
            ->withTimestamps();
    }
}
