<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUs extends Notification
{
    use Queueable;
    public $info;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = 'Maplandi Contact Us Mail From ' . $this->info['name'];
        $head = 'Subject of Mail is ' . $this->info['subject'];
        $body = 'You have a new mail from ' . $this->info['name'] . '<br/> <br/>' . $this->info['message'];
        $footer = 'Contact ' . $this->info['name'] . ' on ' . $this->info['phone'];
        return (new MailMessage)
            ->subject($subject)
            ->greeting($head)
            ->line($body)
            ->line($footer);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
