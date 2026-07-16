<?php

declare(strict_types=1);

namespace App\Providers;

use App\Listeners\InvalidatePageCache;
use App\Models\Event;
use App\Models\Faq;
use App\Models\News;
use App\Models\Notice;
use App\Models\Testimonial;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        foreach ([Notice::class, News::class, Event::class, Faq::class, Testimonial::class] as $model) {
            $model::saved(fn () => app(InvalidatePageCache::class)->handle(new \stdClass()));
            $model::deleted(fn () => app(InvalidatePageCache::class)->handle(new \stdClass()));
        }
    }
}
