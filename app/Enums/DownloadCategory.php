<?php

declare(strict_types=1);

namespace App\Enums;

enum DownloadCategory: string
{
    case AdmissionForm = 'admission_form';
    case Prospectus = 'prospectus';
    case Calendar = 'calendar';
    case Syllabus = 'syllabus';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::AdmissionForm => 'Admission Form',
            self::Prospectus => 'Prospectus',
            self::Calendar => 'Calendar',
            self::Syllabus => 'Syllabus',
            self::Other => 'Other',
        };
    }
}
