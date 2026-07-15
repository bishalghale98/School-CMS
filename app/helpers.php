<?php

if (!function_exists('school_setting')) {
    function school_setting(string $key, mixed $default = null): mixed
    {
        return $default;
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
