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
        'license_number',
        'rating_average',
        'status',
        
    ];

    public function ServiceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'mechanic_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'mechanic_id');
    }

}
