<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mechanic_id',
        'request_id',
        'stars',
        'comment',
        

    ];

    protected function casts(): array
    {
        return [
            'stars' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function MechanicInfo()
    {
        return $this->belongsTo(MechanicInfo::class, 'mechanic_id');
    }

    public function ServiceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }


    //logic or helper method
    public function isValidRating(){
        return $this->Stars >= 1 && $this->Stars <= 5;
    }

     // Scope for filtering by rating
    public function scopeByStars($query, $stars)
    {
        return $query->where('stars', $stars);
    }

    public function scopeHighRated($query)
    {
        return $query->where('stars', '>=', 4);
    }
}
