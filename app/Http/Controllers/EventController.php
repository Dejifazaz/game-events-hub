<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * EventController - Handles all event-related operations
 * 
 * This controller implements the MVC pattern for event management.
 * References: Laravel Controllers - https://laravel.com/docs/12.x/controllers
 *             Laravel Resource Controllers - https://laravel.com/docs/12.x/controllers#resource-controllers
 */

class EventController extends Controller
{
    public function __construct()
    {
        // Guests allowed only to see index and show
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Show events list with role-based filtering
     * 
     * - Guests: only approved events
     * - Users: only approved events (not their own unapproved ones)
     * - Admin: all events
     * 
     * References: Laravel Query Builder - https://laravel.com/docs/12.x/queries
     *             Laravel Pagination - https://laravel.com/docs/12.x/pagination
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $locations = Event::select('location')->distinct()->pluck('location');

        if ($user && $user->role === 'admin') {
            $query = Event::query();
        } else {
            // Guests and regular users only see approved events
            $query = Event::where('approved', true);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $events = $query->orderBy('date', 'desc')->paginate(10);

        return view('events.index', compact('events', 'locations'));
    }

    /**
     * Show a single event:
     * Only approved or belongs to current user.
     */
    public function show(Event $event)
    {
        if (!$event->approved && Auth::id() !== $event->user_id) {
            abort(403, 'Unauthorized access to this event.');
        }

        return view('events.show', compact('event'));
    }

    /**
     * Show form to create event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a new event with image upload
     * 
     * References: Laravel File Storage - https://laravel.com/docs/12.x/filesystem
     *             Laravel Validation - https://laravel.com/docs/12.x/validation
     *             Stack Overflow: Image upload in Laravel - https://stackoverflow.com/questions/42473505/laravel-image-upload-and-resize
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'user_id' => Auth::id(),
            'approved' => Auth::user()->role === 'admin' ? true : false,
            'image' => $imagePath,
        ]);

        $message = Auth::user()->role === 'admin'
            ? 'Event created and automatically approved.'
            : 'Event submitted and is waiting to be approved.';

        return redirect()->route('events.index')->with('success', $message);
    }

    /**
     * Show edit form.
     */
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    /**
     * Update event.
     */
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        $updateData = $request->only(['title', 'description', 'date', 'location', 'capacity']);
        if ($request->hasFile('image')) {
            $updateData['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($updateData);

        return redirect()->route('events.index')->with('success', 'Event updated.');
    }

    /**
     * Delete event.
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted.');
    }
}
