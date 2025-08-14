<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleIssue extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleIssueFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'vehicle_type_id',
    ];

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'vehicle_issue_id ');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_type_id');
    }
}
