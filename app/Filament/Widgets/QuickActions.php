<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Widgets\Widget;

class QuickActions extends Widget implements HasActions
{
    use InteractsWithActions;

    protected string $view = 'filament.widgets.quick-actions';

    protected static ?int $sort = 4;

    public function createNoticeAction(): Action
    {
        return Action::make('createNotice')
            ->label('Create Notice')
            ->url(route('filament.admin.resources.notices.create'))
            ->icon('heroicon-o-document-text')
            ->color('primary');
    }

    public function createNewsAction(): Action
    {
        return Action::make('createNews')
            ->label('Create News')
            ->url(route('filament.admin.resources.news.create'))
            ->icon('heroicon-o-newspaper')
            ->color('success');
    }

    public function createEventAction(): Action
    {
        return Action::make('createEvent')
            ->label('Create Event')
            ->url(route('filament.admin.resources.events.create'))
            ->icon('heroicon-o-calendar')
            ->color('warning');
    }

    public function createPageAction(): Action
    {
        return Action::make('createPage')
            ->label('Create Page')
            ->url(route('filament.admin.resources.pages.create'))
            ->icon('heroicon-o-document')
            ->color('info');
    }
}
