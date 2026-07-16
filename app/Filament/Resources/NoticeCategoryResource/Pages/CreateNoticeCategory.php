<?php

declare(strict_types=1);

namespace App\Filament\Resources\NoticeCategoryResource\Pages;

use App\Filament\Resources\NoticeCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNoticeCategory extends CreateRecord
{
    protected static string $resource = NoticeCategoryResource::class;
}
