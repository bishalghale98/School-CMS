<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EventStatus;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'venue',
        'event_date',
        'start_time',
        'end_time',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'status' => EventStatus::class,
        'event_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
