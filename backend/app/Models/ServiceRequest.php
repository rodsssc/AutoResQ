<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mechanic_id',
        'vehicle_issue_id',
        'location_id',
        'status',
       
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function MechanicInfo()
    {
        return $this->belongsTo(MechanicInfo::class, 'mechanic_id');
    }

    public function Location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function VehicleIssue()
    {
        return $this->belongsTo(VehicleIssue::class, 'vehicle_issue_id');
    }

    
    public function RequestDescriptions()
    {
        return $this->hasMany(RequestDescription::class, 'request_id');
    }
}
