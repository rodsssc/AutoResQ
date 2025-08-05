<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mechanic_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mechanic_id')->onDelete('cascade');
            $table->string('license_number')->unique();
            $table->decimal('rating_average', 3, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive'])->default('active');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanic_infos');
    }
};
