<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    /** @use HasFactory<\Database\Factories\VehiclesFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_type',
    ];


    public function vehicleIssues()
    {
        return $this->hasMany(VehicleIssue::class, 'vehicle_type_id');
    }
}
