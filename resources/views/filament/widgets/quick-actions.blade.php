<x-filament-widgets::widget>
    <x-filament::section heading="Quick Actions">
        <div class="flex flex-wrap gap-2">
            {{ $this->createNoticeAction() }}
            {{ $this->createNewsAction() }}
            {{ $this->createEventAction() }}
            {{ $this->createPageAction() }}
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
