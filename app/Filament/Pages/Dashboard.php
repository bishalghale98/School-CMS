<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Filament\Widgets\AdmissionChart;
use App\Filament\Widgets\QuickActions;
use App\Filament\Widgets\RecentActivity;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            QuickActions::class,
            AdmissionChart::class,
            RecentActivity::class,
        ];
    }
}
