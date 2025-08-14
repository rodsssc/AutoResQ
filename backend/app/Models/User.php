<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'phone',
        'is_active',
        'location_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'driver_id');
    }

    public function MechanicInfo()
    {
        return $this->hasOne(MechanicInfo::class, 'mechanic_id');
    }


    public function Ratings()
    {
        return $this->hasMany(Rating::class, 'driver_id');
    }

        public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMechanic(): bool
    {
        return $this->role === 'mechanic';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function verification()
{
    return $this->hasOne(Verification::class, 'user_id');
}
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

}
