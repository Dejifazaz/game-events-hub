<?php

namespace App\Policies;

/**
 * EventPolicy - Authorization policies for Event model
 * 
 * This policy implements role-based access control for events.
 * References: Laravel Policies - https://laravel.com/docs/12.x/authorization#creating-policies
 *             Laravel Authorization - https://laravel.com/docs/12.x/authorization
 */

use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    use \Illuminate\Auth\Access\HandlesAuthorization;

    /**
     * Allow guests, registered users, and admins to view events
     */
    public function view(?User $user, Event $event): bool
    {
        if (is_null($user)) {
            return $event->approved;
        }

        return $event->approved || $user->role === 'admin' || $user->id === $event->user_id;
    }

    public function create(User $user): bool
    {
        return true; // Any authenticated user
    }

    public function update(User $user, Event $event): bool
    {
        return $user->role === 'admin' || $user->id === $event->user_id;
    }

    public function delete(User $user, Event $event): bool
    {
        return $user->role === 'admin' || $user->id === $event->user_id;
    }

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function approve(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Event $event): bool
    {
        return false;
    }

    public function forceDelete(User $user, Event $event): bool
    {
        return false;
    }
}
