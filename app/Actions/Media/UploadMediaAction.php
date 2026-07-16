<?php

declare(strict_types=1);

namespace App\Actions\Media;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadMediaAction
{
    public function execute(Model $model, string $file, string $collection = 'default'): ?Media
    {
        return $model->addMedia($file)->toMediaCollection($collection);
    }

    public function executeMultiple(Model $model, array $files, string $collection = 'default'): array
    {
        $mediaItems = [];

        foreach ($files as $file) {
            $mediaItems[] = $model->addMedia($file)->toMediaCollection($collection);
        }

        return $mediaItems;
    }
}
