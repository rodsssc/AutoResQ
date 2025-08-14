<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mechanic_id',
        'vehicle_issue_id',
        
        'description',
        'issue_images',
        'status',
    ];

    protected $casts = [
        'issue_images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Status constants based on your schema
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    /**
     * Get all available statuses
     */
    public static function getAllStatuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_ACCEPTED,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED,
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(MechanicInfo::class, 'mechanic_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function vehicleIssue()
    {
        return $this->belongsTo(VehicleIssue::class, 'vehicle_issue_id');
    }

    // If you have conversations and messages
    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'request_id');
    }

    public function messages()
    {
        return $this->hasManyThrough(Message::class, Conversation::class, 'request_id', 'conversation_id');
    }

    // Scope methods for easier querying
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', self::STATUS_ACCEPTED);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', self::STATUS_IN_PROGRESS);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', [
            self::STATUS_PENDING,
            self::STATUS_ACCEPTED,
            self::STATUS_IN_PROGRESS
        ]);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeByMechanic($query, $mechanicId)
    {
        return $query->where('mechanic_id', $mechanicId);
    }

    public function scopeWithImages($query)
    {
        return $query->whereNotNull('issue_images');
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Helper methods for status checking
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isAccepted()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    public function isInProgress()
    {
        return $this->status === self::STATUS_IN_PROGRESS;
    }

    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function isCancelled()
    {
        return $this->status === self::STATUS_CANCELLED;
    }

    public function isActive()
    {
        return in_array($this->status, [
            self::STATUS_PENDING,
            self::STATUS_ACCEPTED,
            self::STATUS_IN_PROGRESS
        ]);
    }

    public function canBeCancelled()
    {
        return !in_array($this->status, [
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED
        ]);
    }

    public function canBeAccepted()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function canProgress()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    public function canBeCompleted()
    {
        return $this->status === self::STATUS_IN_PROGRESS;
    }

    // UI Helper methods
    public function getStatusBadgeColorAttribute()
    {
        return [
            self::STATUS_PENDING => 'warning',
            self::STATUS_ACCEPTED => 'info',
            self::STATUS_IN_PROGRESS => 'primary',
            self::STATUS_COMPLETED => 'success',
            self::STATUS_CANCELLED => 'secondary',
        ][$this->status] ?? 'secondary';
    }

    public function getStatusDisplayNameAttribute()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_CANCELLED => 'Cancelled',
        ][$this->status] ?? 'Unknown';
    }

    // Mutators and Accessors
    public function setIssueImagesAttribute($value)
    {
        $this->attributes['issue_images'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getIssueImagesAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_string($value)) {
            return json_decode($value, true) ?? [];
        }
        
        return $value;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('M d, Y h:i A');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return $this->updated_at->format('M d, Y h:i A');
    }

    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getHasImagesAttribute()
    {
        return !empty($this->issue_images);
    }

    public function getImageCountAttribute()
    {
        return count($this->issue_images);
    }

    // Static methods for statistics
    public static function getStatsByUser($userId)
    {
        return [
            'total' => self::where('user_id', $userId)->count(),
            'pending' => self::where('user_id', $userId)->pending()->count(),
            'accepted' => self::where('user_id', $userId)->accepted()->count(),
            'in_progress' => self::where('user_id', $userId)->inProgress()->count(),
            'completed' => self::where('user_id', $userId)->completed()->count(),
            'cancelled' => self::where('user_id', $userId)->cancelled()->count(),
        ];
    }

    public static function getStatsByMechanic($mechanicId)
    {
        return [
            'total' => self::where('mechanic_id', $mechanicId)->count(),
            'pending' => self::where('mechanic_id', $mechanicId)->pending()->count(),
            'accepted' => self::where('mechanic_id', $mechanicId)->accepted()->count(),
            'in_progress' => self::where('mechanic_id', $mechanicId)->inProgress()->count(),
            'completed' => self::where('mechanic_id', $mechanicId)->completed()->count(),
            'cancelled' => self::where('mechanic_id', $mechanicId)->cancelled()->count(),
        ];
    }

    // Model events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set default status if not provided
            if (empty($model->status)) {
                $model->status = self::STATUS_PENDING;
            }
        });

        static::updated(function ($model) {
            // Log status changes
            if ($model->wasChanged('status')) {
                Log::info('Service Request status changed', [
                    'request_id' => $model->id,
                    'old_status' => $model->getOriginal('status'),
                    'new_status' => $model->status,
                ]);
            }
        });
    }

    // Search functionality
    public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('description', 'like', "%{$search}%")
              ->orWhereHas('user', function ($userQuery) use ($search) {
                  $userQuery->where('name', 'like', "%{$search}%")
                           ->orWhere('email', 'like', "%{$search}%");
              })
              ->orWhereHas('mechanic', function ($mechanicQuery) use ($search) {
                  $mechanicQuery->where('name', 'like', "%{$search}%");
              });
        });
    }
}