<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'first_name',
        'second_name',
        'birthday',
        'cni',
        'phone',
        'address',
        'salary',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function vehicles () {
        return $this->belongsToMany(Vehicle::class, 'drive')->withPivot('created_at');
    }

    public function maintenances () {
        return $this->hasMany(Maintenance::class);
    }

    public function carburants () {
        return $this->hasMany(Carburant::class);
    }

    public function localisations() {
        return $this->hasMany(Localization::class);
    }
}
