<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\InquirySubmitted;
use App\Mail\InquiryConfirmation;
use Illuminate\Support\Facades\Mail;

class SendInquiryConfirmation
{
    public function handle(InquirySubmitted $event): void
    {
        if ($event->inquiry->email) {
            Mail::to($event->inquiry->email)
                ->send(new InquiryConfirmation($event->inquiry));
        }
    }
}
