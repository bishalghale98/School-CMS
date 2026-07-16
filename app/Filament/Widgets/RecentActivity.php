<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Spatie\Activitylog\Models\Activity;

class RecentActivity extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Activity::query()->latest()->limit(10)
            )
            ->columns([
                TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime('M d, H:i')
                    ->sortable(),
                TextColumn::make('causer.name')
                    ->label('User')
                    ->default('System'),
                TextColumn::make('description')
                    ->label('Action')
                    ->wrap(),
                TextColumn::make('subject_type')
                    ->label('Type')
                    ->formatStateUsing(fn ($state) => class_basename($state ?? '')),
            ])
            ->paginated(false);
    }
}
