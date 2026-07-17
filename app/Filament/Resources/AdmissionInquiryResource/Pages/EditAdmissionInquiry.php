<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionInquiryResource\Pages;

use App\Filament\Resources\AdmissionInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionInquiry extends EditRecord
{
    protected static string $resource = AdmissionInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
