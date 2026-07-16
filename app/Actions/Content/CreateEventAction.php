<?php

declare(strict_types=1);

namespace App\Actions\Content;

use App\Enums\EventStatus;
use App\Models\Event;

class CreateEventAction
{
    public function execute(array $data): Event
    {
        if (!isset($data['status'])) {
            $data['status'] = EventStatus::Upcoming;
        }

        return Event::create($data);
    }
}
