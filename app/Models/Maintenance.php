<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'date',
        'numfact',
        'repsais',
        'montantM',
    ];

    public function vehicle () {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver () {
        return $this->belongsTo(Driver::class);
    }

}
