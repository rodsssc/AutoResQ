<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /** @use HasFactory<\Database\Factories\ConversationFactory> */
    use HasFactory;

    protected $fillable = [
        'request_id',
        'user_id',
        'mechanic_id',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
