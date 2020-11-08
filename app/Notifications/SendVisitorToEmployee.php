<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class SendVisitorToEmployee extends Notification implements ShouldQueue
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
        $array = ['database'];
        if (setting('notifications_sms') != true &&
            !blank(setting('twilio_from')) &&
            !blank(setting('twilio_sid')) &&
            !blank(setting('twilio_sid'))
        ) {
            array_push($array, TwilioChannel::class);
        }

        if (setting('notifications_email') != false &&
            !blank(setting('mail_host')) &&
            !blank(setting('mail_username')) &&
            !blank(setting('mail_password')) &&
            !blank(setting('mail_port')) &&
            !blank(setting('mail_from_name')) &&
            !blank(setting('mail_from_address'))
        ) {
            array_push($array, 'mail');
        }

        return $array;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject("New Booking#" .$this->invitee->booking_id)
            ->greeting('Hello!')
            ->line('New Visitor Register please Approved your booking')
            ->line(setting('notify_templates'))
            ->line('Visitor Name '. $this->invitee->name . ' Email ' .$this->invitee->email )
            ->line('Thank you for using our application! '.setting('site_name'));
    }

    /**
     * @param $notifiable
     * @return \NotificationChannels\Twilio\TwilioMessage|TwilioSmsMessage
     */
    public function toTwilio($notifiable)
    {
        return (new TwilioSmsMessage())
            ->content(setting('notify_templates') .'New Visitor Register please Approved your booking'. 'Visitor Name '. $this->invitee->name . ' Email ' .$this->invitee->email);
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
