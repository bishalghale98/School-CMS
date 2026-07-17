<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\AdmissionInquiry;
use App\Models\ContactSubmission;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Notice;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    public function getColumns(): int
    {
        return 6;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Notices', Notice::count())
                ->description('Total notices')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make('News', News::count())
                ->description('Total news articles')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('success'),
            Stat::make('Events', Event::count())
                ->description('Total events')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning'),
            Stat::make('Inquiries', AdmissionInquiry::count())
                ->description('Total admission inquiries')
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),
            Stat::make('Gallery Albums', Gallery::count())
                ->description('Total albums')
                ->descriptionIcon('heroicon-o-photo')
                ->color('danger'),
            Stat::make('Contact Inquiries', ContactSubmission::count())
                ->description('Total contact messages')
                ->descriptionIcon('heroicon-o-envelope')
                ->color('info'),
        ];
    }
}
