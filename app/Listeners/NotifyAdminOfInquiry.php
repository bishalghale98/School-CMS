<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\InquirySubmitted;
use App\Models\User;
use App\Notifications\InquiryNotification;

class NotifyAdminOfInquiry
{
    public function handle(InquirySubmitted $event): void
    {
        $admins = User::role(['super_admin', 'admin'])->get();

        foreach ($admins as $admin) {
            $admin->notify(new InquiryNotification($event->inquiry));
        }
    }
}
