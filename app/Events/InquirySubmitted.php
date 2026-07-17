<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\AdmissionInquiry;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InquirySubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public AdmissionInquiry $inquiry;

    public function __construct(AdmissionInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }
}
