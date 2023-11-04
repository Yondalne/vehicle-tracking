<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = [
        "vehicle_id",
        "longitude",
        "latitude",
        "date",
        "hour",
    ];


    public function vehicle () {
        return $this->belongsTo(Vehicle::class);
    }
}