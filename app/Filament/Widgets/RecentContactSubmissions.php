<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\ContactSubmission;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentContactSubmissions extends BaseWidget
{
    protected static ?string $heading = 'Recent Contact Inquiries';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function getTable(): Table
    {
        return Tables\Table::make()
            ->query(ContactSubmission::query()->latest())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('message')
                    ->limit(60),
                Tables\Columns\ToggleColumn::make('is_read')
                    ->label('Read')
                    ->onColor('success')
                    ->offColor('gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (ContactSubmission $record): string => \App\Filament\Resources\ContactSubmissionResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn ($records) => $records->each->update(['is_read' => true]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('markUnread')
                        ->label('Mark as Unread')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn ($records) => $records->each->update(['is_read' => false]))
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
