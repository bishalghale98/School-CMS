<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionInquiryResource\Pages;

use App\Filament\Resources\AdmissionInquiryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionInquiries extends ListRecords
{
    protected static string $resource = AdmissionInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
