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
        'production_year'
    ];

    public function drivers() {
        return $this->belongsToMany(Driver::class, 'drive')->withPivot('created_at');
    }

    public function localizations() {
        return $this->hasMany(Localization::class);
    }
}
