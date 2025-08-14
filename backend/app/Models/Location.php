<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $fillable = [
        'mechanic_id',
        'service_request_id',
        'latitude',
        'longitude',
        'address',

    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(MechanicInfo::class, 'mechanic_id');
    }
    
}
