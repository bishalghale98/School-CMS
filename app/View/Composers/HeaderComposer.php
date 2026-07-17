<?php

declare(strict_types=1);

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $navigation = [];

        $mainMenu = Menu::with(['items' => function ($query) {
            $query->where('is_active', true)->whereNull('parent_id')->orderBy('sort_order');
        }])->where('location', 'main')->first();

        if ($mainMenu) {
            $items = $mainMenu->items->map(function ($item) {
                $data = [
                    'label' => $item->label,
                    'url' => $item->url,
                    'route' => '',
                    'routes' => [],
                ];

                $children = $item->children()->where('is_active', true)->orderBy('sort_order')->get();
                if ($children->isNotEmpty()) {
                    $data['children'] = $children->map(fn ($child) => [
                        'label' => $child->label,
                        'url' => $child->url,
                        'route' => '',
                    ])->toArray();
                }

                return $data;
            })->toArray();

            $navigation = $items;
        }

        if (empty($navigation)) {
            $navigation = [
                ['label' => 'Home', 'route' => 'home', 'url' => route('home'), 'routes' => ['home']],
                ['label' => 'About', 'route' => 'about.index', 'url' => route('about.index'), 'routes' => ['about.index', 'about.history', 'about.vision-mission', 'about.committee']],
                ['label' => 'Notices', 'route' => 'notices.index', 'url' => route('notices.index'), 'routes' => ['notices.index', 'notices.show']],
                ['label' => 'News', 'route' => 'news.index', 'url' => route('news.index'), 'routes' => ['news.index', 'news.show']],
                ['label' => 'Events', 'route' => 'events.index', 'url' => route('events.index'), 'routes' => ['events.index', 'events.show']],
                ['label' => 'Gallery', 'route' => 'gallery.index', 'url' => route('gallery.index'), 'routes' => ['gallery.index', 'gallery.show']],
                ['label' => 'Downloads', 'route' => 'downloads', 'url' => route('downloads'), 'routes' => ['downloads']],
                ['label' => 'Contact', 'route' => 'contact', 'url' => route('contact'), 'routes' => ['contact']],
            ];
        }

        $view->with('navigation', $navigation);
    }
}
