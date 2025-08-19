<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get user's events
        $userEvents = Event::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
            
        // Get user's approved events count
        $approvedEventsCount = Event::where('user_id', $user->id)
            ->where('approved', true)
            ->count();
            
        // Get user's pending events count
        $pendingEventsCount = Event::where('user_id', $user->id)
            ->where('approved', false)
            ->count();
            
        // Get total events count
        $totalEventsCount = Event::where('user_id', $user->id)->count();
        
        // Get upcoming events (next 30 days)
        $upcomingEvents = Event::where('user_id', $user->id)
            ->where('approved', true)
            ->where('date', '>=', now())
            ->where('date', '<=', now()->addDays(30))
            ->orderBy('date', 'asc')
            ->take(3)
            ->get();

        return view('user.dashboard', compact(
            'userEvents',
            'approvedEventsCount',
            'pendingEventsCount',
            'totalEventsCount',
            'upcomingEvents'
        ));
    }
    
    public function myEvents()
    {
        $events = Event::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->paginate(10);
            
        return view('user.my-events', compact('events'));
    }
}
