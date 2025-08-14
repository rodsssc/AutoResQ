<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'message',
        'is_read',
        'read_at',
        'attachment_url',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
