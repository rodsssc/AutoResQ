<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            
            $table->foreignId('mechanic_id')->nullable()->onDelete('cascade');
            $table->foreignId('vehicle_issue_id')->onDelete('cascade');
            $table->foreignId('location_id')->onDelete('cascade');
            
            $table->enum('status', ['pending', 'accepted', 'in_progress', 'completed', 'cancelled'])
                  ->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};