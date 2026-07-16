<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicProgram extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'level',
        'duration',
        'medium',
        'features',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'features' => 'array',
        'is_published' => 'boolean',
    ];

    protected function slugSource(): string
    {
        return 'name';
    }
}
