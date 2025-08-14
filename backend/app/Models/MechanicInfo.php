<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicInfo extends Model
{
    /** @use HasFactory<\Database\Factories\MechanicInfoFactory> */
    use HasFactory;

   protected $fillable = [
        'mechanic_id',
        'specialization', // e.g., motorcycle, car, both
        'rating_average',
        'status', // e.g., Available, Busy, Offline
        
    ];
    public function ServiceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'mechanic_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'mechanic_id');
    }

    public function Location()
    {
        return $this->hasOne(Location::class, 'location_id');
    }

}
