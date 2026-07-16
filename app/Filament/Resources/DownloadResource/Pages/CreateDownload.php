<?php

declare(strict_types=1);

namespace App\Filament\Resources\DownloadResource\Pages;

use App\Filament\Resources\DownloadResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDownload extends CreateRecord
{
    protected static string $resource = DownloadResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;
        if ($record->file_path) {
            $fullPath = storage_path('app/public/' . $record->file_path);
            if (file_exists($fullPath)) {
                $record->update([
                    'file_type' => pathinfo($record->file_path, PATHINFO_EXTENSION),
                    'file_size' => filesize($fullPath),
                ]);
            }
        }
    }
}
