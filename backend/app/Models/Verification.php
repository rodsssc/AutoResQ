<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    /** @use HasFactory<\Database\Factories\VerificationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'document_number',
        'document_image',
        'status',
        'admin_notes',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
