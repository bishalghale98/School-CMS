<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('hero_image')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->json('gallery')->nullable();
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->json('images')->nullable();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->string('photo')->nullable();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->string('photo')->nullable();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->dropColumn('images');
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('photo');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('photo');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['logo', 'favicon']);
        });
    }
};
