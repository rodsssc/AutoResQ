<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleIssue extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleIssueFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'vehicle_issue_id ');
    }
}
