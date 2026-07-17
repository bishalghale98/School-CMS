<?php

declare(strict_types=1);

namespace App\Actions\Admission;

use App\Enums\AdmissionStatus;
use App\Events\InquirySubmitted;
use App\Models\AdmissionInquiry;

class ProcessInquiryAction
{
    public function execute(array $data): AdmissionInquiry
    {
        $data['status'] = AdmissionStatus::New;

        $inquiry = AdmissionInquiry::create($data);

        event(new InquirySubmitted($inquiry));

        return $inquiry;
    }
}
