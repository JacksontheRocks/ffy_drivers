<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nif_cif',
        'direccion',
        'codigo_postal',
        'provincia',
        'localidad',
        'telefono',
        'password',
        'active_vehicle_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación muchos a muchos con vehicles
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'driver_vehicle');
    }

    // Relación con el vehículo activo
    public function activeVehicle()
    {
        return $this->belongsTo(Vehicle::class, 'active_vehicle_id');
    }
}
