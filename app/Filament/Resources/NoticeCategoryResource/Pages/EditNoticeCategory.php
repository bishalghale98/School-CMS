<?php

declare(strict_types=1);

namespace App\Filament\Resources\NoticeCategoryResource\Pages;

use App\Filament\Resources\NoticeCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNoticeCategory extends EditRecord
{
    protected static string $resource = NoticeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
