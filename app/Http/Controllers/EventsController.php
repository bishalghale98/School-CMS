<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\EventStatus;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $upcoming = Event::whereIn('status', [EventStatus::Upcoming, EventStatus::Ongoing])
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->paginate(12, ['*'], 'upcoming_page');

        $past = Event::where('status', EventStatus::Completed)
            ->where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->paginate(12, ['*'], 'past_page');

        return view('pages.events.index', compact('upcoming', 'past'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', '!=', EventStatus::Cancelled)
            ->firstOrFail();

        return view('pages.events.show', compact('event'));
    }
}
