<?php

declare(strict_types=1);

namespace App\Enums;

enum FacilityType: string
{
    case Library = 'library';
    case ComputerLab = 'computer_lab';
    case ScienceLab = 'science_lab';
    case Transportation = 'transportation';
    case Hostel = 'hostel';
    case Sports = 'sports';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Library => 'Library',
            self::ComputerLab => 'Computer Lab',
            self::ScienceLab => 'Science Lab',
            self::Transportation => 'Transportation',
            self::Hostel => 'Hostel',
            self::Sports => 'Sports',
            self::Other => 'Other',
        };
    }
}
