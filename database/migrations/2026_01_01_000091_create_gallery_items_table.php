<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained()->cascadeOnDelete();
            $table->string('title', 255)->nullable();
            $table->string('type', 20)->default('image');
            $table->string('file_path');
            $table->string('video_url', 500)->nullable();
            $table->text('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('gallery_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
