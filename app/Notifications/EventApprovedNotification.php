<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event;

/**
 * EventApprovedNotification - Email notification for event approval
 * 
 * This notification is sent to users when their events are approved by admins.
 * References: Laravel Notifications - https://laravel.com/docs/12.x/notifications
 *             Laravel Mail - https://laravel.com/docs/12.x/mail
 */
class EventApprovedNotification extends Notification
{
    use Queueable;

    protected $event;

    /**
     * Create a new notification instance.
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your Event Has Been Approved! 🎉')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Great news! Your event "' . $this->event->title . '" has been approved by our admin team.')
            ->line('Event Details:')
            ->line('• Title: ' . $this->event->title)
            ->line('• Date: ' . $this->event->date->format('F j, Y \a\t g:i A'))
            ->line('• Location: ' . $this->event->location)
            ->line('• Capacity: ' . $this->event->capacity . ' people')
            ->action('View Event', url('/events/' . $this->event->id))
            ->line('Your event is now live and visible to all users on our platform.')
            ->line('Thank you for using Game Events Hub!')
            ->salutation('Best regards, The Game Events Hub Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event_id' => $this->event->id,
            'event_title' => $this->event->title,
            'message' => 'Your event "' . $this->event->title . '" has been approved!'
        ];
    }
}
