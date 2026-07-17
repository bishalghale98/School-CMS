<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\AdmissionStatus;
use App\Filament\Resources\AdmissionInquiryResource\Pages;
use App\Models\AdmissionInquiry;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdmissionInquiryResource extends Resource
{
    protected static ?string $model = AdmissionInquiry::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string | \UnitEnum | null $navigationGroup = 'Admissions';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Inquiry Details')->schema([
                    TextInput::make('student_name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('applying_class')
                        ->required()
                        ->maxLength(100),
                    TextInput::make('parent_name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('mobile')
                        ->required()
                        ->maxLength(50),
                    TextInput::make('email')
                        ->email()
                        ->maxLength(255),
                    Textarea::make('address')
                        ->required(),
                    TextInput::make('previous_school')
                        ->maxLength(255),
                    Textarea::make('message')
                        ->columnSpanFull(),
                ])->columns(2),
                Section::make('Management')->schema([
                    Select::make('status')
                        ->options(AdmissionStatus::class)
                        ->required(),
                    Textarea::make('notes')
                        ->columnSpanFull(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('applying_class')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parent_name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(AdmissionStatus::class),
                Filter::make('created_at')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('from'),
                        \Filament\Forms\Components\DatePicker::make('until'),
                    ])
                    ->query(fn (Builder $query, array $data) => $query
                        ->when($data['from'], fn ($q, $v) => $q->whereDate('created_at', '>=', $v))
                        ->when($data['until'], fn ($q, $v) => $q->whereDate('created_at', '<=', $v))),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmissionInquiries::route('/'),
            'create' => Pages\CreateAdmissionInquiry::route('/create'),
            'edit' => Pages\EditAdmissionInquiry::route('/{record}/edit'),
        ];
    }
}
