<?php

if (!function_exists('school_setting')) {
    function school_setting(string $key, mixed $default = null): mixed
    {
        return \Illuminate\Support\Facades\Cache::remember("setting:{$key}", 3600, function () use ($key, $default) {
            $setting = \App\Models\Setting::where('key', $key)->first();
            return $setting?->value ?? $default;
        });
    }
}

if (!function_exists('format_file_size')) {
    function format_file_size(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }
        return round($bytes, 1) . ' ' . $units[$i];
    }
}
