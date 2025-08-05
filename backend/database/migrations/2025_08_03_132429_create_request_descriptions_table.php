<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('request_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->json('issue_images')->nullable();
            $table->json('video_url')->nullable();
            $table->json('audio_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_descriptions');
    }
};