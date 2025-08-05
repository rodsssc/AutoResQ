<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDescription extends Model
{
    /** @use HasFactory<\Database\Factories\RequestDescriptionFactory> */
    use HasFactory;

    protected $fillable = [
        'request_id',
        'description',
        'issue_images',
        'audio_notes',
        'video_url',
    ];

    protected function casts(): array
    {
        return [
            'issue_images' => 'array',
            'audio_notes' => 'array',     // Added: cast as array
            'video_url' => 'array',     // Added: cast as array
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    //Relationships
    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'request_id');
    }

    

    // Helper methods
    public function hasImages()
    {
        return !empty($this->IssueImages);
    }

    public function getImageCount()
    {
        return count($this->IssueImages ?? []);
    }

    public function addImage($imageUrl)
    {
        $images = $this->IssueImages ?? [];
        $images[] = $imageUrl;
        $this->update(['issue_images' => $images]);
    }

    public function removeImage($imageUrl)
    {
        $images = $this->IssueImages ?? [];
        $images = array_filter($images, fn($img) => $img !== $imageUrl);
        $this->update(['issue_images' => array_values($images)]);
    }

    public function hasAudio()
    {
        return !empty($this->AudioNote);
    }

    public function hasVideo()
    {
        return !empty($this->VideoUrl);
    }

    public function hasMediaContent()
    {
        return $this->hasImages() || $this->hasAudio() || $this->hasVideo();
    }


}
