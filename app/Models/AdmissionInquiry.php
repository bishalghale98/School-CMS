<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AdmissionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionInquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_name',
        'applying_class',
        'parent_name',
        'mobile',
        'email',
        'address',
        'previous_school',
        'message',
        'status',
        'notes',
    ];

    protected $casts = [
        'status' => AdmissionStatus::class,
    ];
}
