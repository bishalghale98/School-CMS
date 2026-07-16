<?php

declare(strict_types=1);

namespace App\Traits;

use App\Services\SlugService;
use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function (Model $model) {
            if (empty($model->slug)) {
                $source = $model->slugSource();
                $model->slug = app(SlugService::class)->makeUnique(
                    $model->{$source},
                    $model->getTable(),
                    $model->id
                );
            }
        });

        static::updating(function (Model $model) {
            $source = $model->slugSource();
            if ($model->isDirty($source) && !$model->isDirty('slug')) {
                $model->slug = app(SlugService::class)->makeUnique(
                    $model->{$source},
                    $model->getTable(),
                    $model->id
                );
            }
        });
    }

    protected function slugSource(): string
    {
        return 'title';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
