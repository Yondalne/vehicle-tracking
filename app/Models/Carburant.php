<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'date',
        'numfactCa',
        'nblitre',
        'montant',
    ];

    public function vehicle () {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver () {
        return $this->belongsTo(Driver::class);
    }
}
