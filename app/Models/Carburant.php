<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'numfactCa',
        'nblitre',
        'montant',
    ];

    public function vehicle () {
        return $this->belongsTo(Vehicle::class);
    }
}
