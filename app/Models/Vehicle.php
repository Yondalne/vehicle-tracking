<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'power',
        'color',
        'brand',
        'production_year',
        'driver_id'
    ];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function localizations() {
        return $this->hasMany(Localization::class);
    }

    public function maintenances () {
        return $this->hasMany(Maintenance::class);
    }

    public function carburants () {
        return $this->hasMany(Carburant::class);
    }
}
