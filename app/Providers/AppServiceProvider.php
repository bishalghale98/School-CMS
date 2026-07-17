<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\InquirySubmitted;
use App\Listeners\InvalidatePageCache;
use App\Listeners\NotifyAdminOfInquiry;
use App\Listeners\SendInquiryConfirmation;
use App\Listeners\UpdateSitemapCache;
use App\Models\Event as EventModel;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Testimonial;
use App\View\Composers\FooterComposer;
use App\View\Composers\HeaderComposer;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        foreach ([Notice::class, News::class, EventModel::class, Faq::class, Testimonial::class, Slider::class, Gallery::class] as $model) {
            $model::saved(fn () => app(InvalidatePageCache::class)->handle(new \stdClass()));
            $model::deleted(fn () => app(InvalidatePageCache::class)->handle(new \stdClass()));
        }

        foreach ([Notice::class, News::class, EventModel::class, Faq::class, Testimonial::class, Slider::class, Gallery::class] as $model) {
            $model::saved(fn () => app(UpdateSitemapCache::class)->handle(new \stdClass()));
            $model::deleted(fn () => app(UpdateSitemapCache::class)->handle(new \stdClass()));
        }

        View::composer('layouts.public', HeaderComposer::class);
        View::composer('layouts.public', FooterComposer::class);

        Event::listen(
            InquirySubmitted::class,
            [NotifyAdminOfInquiry::class, 'handle'],
        );

        Event::listen(
            InquirySubmitted::class,
            [SendInquiryConfirmation::class, 'handle'],
        );
    }
}
