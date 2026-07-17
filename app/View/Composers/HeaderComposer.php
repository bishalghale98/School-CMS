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
                ['label' => 'About', 'route' => 'about.index', 'url' => route('about.index'), 'routes' => ['about.index', 'about.history', 'about.vision-mission', 'about.committee'],
                    'children' => [
                        ['label' => 'History', 'url' => route('about.history'), 'route' => 'about.history'],
                        ['label' => 'Vision & Mission', 'url' => route('about.vision-mission'), 'route' => 'about.vision-mission'],
                        ['label' => 'Committee', 'url' => route('about.committee'), 'route' => 'about.committee'],
                    ],
                ],
                ['label' => 'Academics', 'route' => 'academics', 'url' => route('academics'), 'routes' => ['academics']],
                ['label' => 'News & Events', 'route' => 'news.index', 'url' => route('news.index'), 'routes' => ['news.index', 'news.show', 'events.index', 'events.show'],
                    'children' => [
                        ['label' => 'News', 'url' => route('news.index'), 'route' => 'news.index'],
                        ['label' => 'Events', 'url' => route('events.index'), 'route' => 'events.index'],
                    ],
                ],
                ['label' => 'School', 'route' => 'gallery.index', 'url' => route('gallery.index'), 'routes' => ['gallery.index', 'gallery.show', 'facilities', 'downloads'],
                    'children' => [
                        ['label' => 'Gallery', 'url' => route('gallery.index'), 'route' => 'gallery.index'],
                        ['label' => 'Facilities', 'url' => route('facilities'), 'route' => 'facilities'],
                        ['label' => 'Downloads', 'url' => route('downloads'), 'route' => 'downloads'],
                    ],
                ],
                ['label' => 'Contact', 'route' => 'contact', 'url' => route('contact'), 'routes' => ['contact']],
            ];
        }

        $view->with('navigation', $navigation);
    }
}
