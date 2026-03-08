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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            // Who uploaded it (requires login)
           $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            // 'image' or 'video'
            $table->string('type');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            // Paths to the actual files in storage
            $table->string('file_path');
            $table->string('thumbnail_path')->nullable(); // Useful for video covers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
