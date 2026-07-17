<?php

declare(strict_types=1);

namespace App\Listeners;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class UpdateSitemapCache
{
    public function handle(object $event): void
    {
        try {
            $sitemap = Sitemap::create()
                ->add(Url::create('/')->setChangeFrequency('weekly')->setPriority(1.0))
                ->add(Url::create('/about')->setChangeFrequency('monthly')->setPriority(0.8))
                ->add(Url::create('/about/overview')->setChangeFrequency('monthly')->setPriority(0.6))
                ->add(Url::create('/about/mission-vision')->setChangeFrequency('monthly')->setPriority(0.6))
                ->add(Url::create('/about/history')->setChangeFrequency('monthly')->setPriority(0.6))
                ->add(Url::create('/about/leadership')->setChangeFrequency('monthly')->setPriority(0.6))
                ->add(Url::create('/academics')->setChangeFrequency('weekly')->setPriority(0.8))
                ->add(Url::create('/admissions')->setChangeFrequency('monthly')->setPriority(0.7))
                ->add(Url::create('/teachers')->setChangeFrequency('weekly')->setPriority(0.7))
                ->add(Url::create('/facilities')->setChangeFrequency('monthly')->setPriority(0.6))
                ->add(Url::create('/downloads')->setChangeFrequency('weekly')->setPriority(0.6))
                ->add(Url::create('/contact')->setChangeFrequency('monthly')->setPriority(0.7))
                ->add(Url::create('/faq')->setChangeFrequency('weekly')->setPriority(0.6))
                ->add(Url::create('/search')->setChangeFrequency('weekly')->setPriority(0.4));

            foreach (\App\Models\Notice::published()->get() as $notice) {
                $sitemap->add(Url::create("/notices/{$notice->slug}")
                    ->setLastModificationDate($notice->updated_at)
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.5));
            }

            foreach (\App\Models\News::published()->get() as $news) {
                $sitemap->add(Url::create("/news/{$news->slug}")
                    ->setLastModificationDate($news->updated_at)
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.6));
            }

            foreach (\App\Models\Event::published()->get() as $event) {
                $sitemap->add(Url::create("/events/{$event->slug}")
                    ->setLastModificationDate($event->updated_at)
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.5));
            }

            foreach (\App\Models\Gallery::query()->where('is_published', true)->get() as $album) {
                $sitemap->add(Url::create("/gallery/{$album->slug}")
                    ->setLastModificationDate($album->updated_at)
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.5));
            }

            $sitemap->writeToFile(public_path('sitemap.xml'));
        } catch (\Throwable) {
        }
    }
}
