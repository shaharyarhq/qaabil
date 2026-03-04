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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('chapter_id')->constrained();
            $table->foreignId('objective_id')->constrained();
            $table->string('title', 255);
            $table->string('video_url', 1024)->nullable();
            $table->string('thumbnail_url', 1024)->nullable();
            $table->string('status', 255)->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users', 'id');
            $table->userstamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
