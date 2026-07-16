<?php

declare(strict_types=1);

namespace App\Filament\Resources\NoticeCategoryResource\Pages;

use App\Filament\Resources\NoticeCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNoticeCategories extends ListRecords
{
    protected static string $resource = NoticeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
