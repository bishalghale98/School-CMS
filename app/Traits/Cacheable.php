<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    public static function bootCacheable(): void
    {
        static::saved(function ($model) {
            Cache::forget(static::cacheKey($model));
        });

        static::deleted(function ($model) {
            Cache::forget(static::cacheKey($model));
        });
    }

    public static function cacheKey($model): string
    {
        return static::class . ':' . $model->getKey();
    }

    public static function cachedFind(int|string $key, int $ttl = 3600): ?static
    {
        $cacheKey = static::class . ':' . $key;

        return Cache::remember($cacheKey, $ttl, function () use ($key) {
            return static::find($key);
        });
    }
}
