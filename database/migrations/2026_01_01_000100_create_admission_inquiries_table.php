<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('applying_class', 100);
            $table->string('parent_name');
            $table->string('mobile', 50);
            $table->string('email', 255)->nullable();
            $table->text('address');
            $table->string('previous_school', 255)->nullable();
            $table->text('message')->nullable();
            $table->string('status', 20)->default('new');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_inquiries');
    }
};
