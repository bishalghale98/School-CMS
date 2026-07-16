<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\FacilityType;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'features',
        'type',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'features' => 'array',
        'type' => FacilityType::class,
        'is_published' => 'boolean',
    ];

    protected function slugSource(): string
    {
        return 'name';
    }
}
