<?php

declare(strict_types=1);

namespace App\Actions\System;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Collection;

class SyncMenuAction
{
    public function execute(Menu $menu, array $items): void
    {
        $existingIds = $menu->items()->pluck('id')->toArray();
        $incomingIds = [];

        foreach ($items as $index => $item) {
            $menuItem = MenuItem::updateOrCreate(
                ['id' => $item['id'] ?? null],
                [
                    'menu_id' => $menu->id,
                    'parent_id' => $item['parent_id'] ?? null,
                    'label' => $item['label'],
                    'url' => $item['url'],
                    'target' => $item['target'] ?? '_self',
                    'sort_order' => $index,
                    'is_active' => $item['is_active'] ?? true,
                ]
            );
            $incomingIds[] = $menuItem->id;
        }

        $toDelete = array_diff($existingIds, $incomingIds);
        if (!empty($toDelete)) {
            MenuItem::destroy($toDelete);
        }
    }

    public function buildTree(Menu $menu): Collection
    {
        return $menu->items()
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->with(['children' => fn ($q) => $q->orderBy('sort_order')])
            ->get();
    }
}
