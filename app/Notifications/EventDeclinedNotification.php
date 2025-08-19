<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * EventDeclinedNotification - Email notification for event decline
 * 
 * This notification is sent to users when their events are declined by admins.
 * References: Laravel Notifications - https://laravel.com/docs/12.x/notifications
 *             Laravel Mail - https://laravel.com/docs/12.x/mail
 */
class EventDeclinedNotification extends Notification
{
    use Queueable;

    protected $eventTitle;
    protected $eventDetails;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $eventTitle, array $eventDetails = [])
    {
        $this->eventTitle = $eventTitle;
        $this->eventDetails = $eventDetails;
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
        $message = (new MailMessage)
            ->subject('Event Review Update - Event Declined')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('We regret to inform you that your event "' . $this->eventTitle . '" has been declined by our admin team.')
            ->line('This decision was made after careful review of your event submission.');

        if (!empty($this->eventDetails)) {
            $message->line('Event Details:');
            foreach ($this->eventDetails as $key => $value) {
                $message->line('• ' . ucfirst($key) . ': ' . $value);
            }
        }

        $message->line('Possible reasons for decline:')
            ->line('• Event content may not meet our community guidelines')
            ->line('• Incomplete or inaccurate information provided')
            ->line('• Event may be inappropriate for our platform')
            ->line('• Duplicate or similar event already exists')
            ->action('Create New Event', url('/events/create'))
            ->line('You are welcome to submit a new event with updated information.')
            ->line('If you have any questions, please contact our support team.')
            ->salutation('Best regards, The Game Events Hub Team');

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event_title' => $this->eventTitle,
            'message' => 'Your event "' . $this->eventTitle . '" has been declined.',
            'event_details' => $this->eventDetails
        ];
    }
}
