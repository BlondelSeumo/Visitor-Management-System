<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendInvitationToVisitors extends Notification implements ShouldQueue
{
    use Queueable;

    private $invitee;

    /**
     * SendInvitationToVisitors constructor.
     * @param $invitee
     */
    public function __construct($invitee)
    {
        $this->invitee = $invitee;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('invitations/register/'.$this->invitee->token);

        return (new MailMessage)
            ->subject("You Have Been Invited in a new Booking#")
            ->greeting('Hello!')
            ->line('You Have Been Invited in a new Visitor Register')
            ->action('View Invitation Register', $url)
            ->line(setting('invite_templates'))
            ->line('Thank you for using our application! '.setting('site_name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
