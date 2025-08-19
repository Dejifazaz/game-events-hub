<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || !auth()->user()->isAdmin()) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function adminDashboard()
    {
        $pendingCount = Event::where('approved', false)->count();
        $recentEvents = Event::orderBy('date', 'desc')->limit(10)->get();

        return view('admin.dashboard', compact('pendingCount', 'recentEvents'));
    }

    public function pendingEvents()
    {
        $events = Event::where('approved', false)->get();
        return view('admin.pending', compact('events'));
    }

    public function approveEvent(Event $event)
    {
        $event->approved = true;
        $event->save();

        // Send notification to event creator
        $event->user->notify(new \App\Notifications\EventApprovedNotification($event));

        return redirect()->route('admin.events.pending')->with('success', 'Event approved and notification sent.');
    }

    public function declineEvent(Event $event)
    {
        // Store event details before deletion for notification
        $eventTitle = $event->title;
        $eventDetails = [
            'date' => $event->date->format('F j, Y \a\t g:i A'),
            'location' => $event->location,
            'capacity' => $event->capacity . ' people'
        ];
        
        // Send notification to event creator before deletion
        $event->user->notify(new \App\Notifications\EventDeclinedNotification($eventTitle, $eventDetails));
        
        // Delete the event
        $event->delete();

        return redirect()->route('admin.events.pending')->with('success', "Event '{$eventTitle}' has been declined and removed. Notification sent to user.");
    }

    /**
     * List events created by the current admin
     */
    public function myEvents()
    {
        $events = Event::where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('admin.my-events', compact('events'));
    }
}
