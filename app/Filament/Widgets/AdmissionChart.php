<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\AdmissionInquiry;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AdmissionChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function getHeading(): string
    {
        return 'Inquiries (6 Months)';
    }

    public function getData(): array
    {
        $results = AdmissionInquiry::query()
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Inquiries',
                    'data' => $results->pluck('total'),
                    'backgroundColor' => '#3B82F6',
                    'borderColor' => '#2563EB',
                ],
            ],
            'labels' => $results->pluck('month'),
        ];
    }

    public function getType(): string
    {
        return 'line';
    }
}
