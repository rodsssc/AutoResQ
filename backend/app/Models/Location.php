<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $fillbale = [
        'latitude',
        'longitude',
        'address',
    ];

    public function ServiceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'location_id');
    }
    
}
