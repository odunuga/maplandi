<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminPaymentConfirmation extends Notification
{
    use Queueable;
    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
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
        if (isset($this->order->buyer) && $this->order->buyer) {
            $line1 = 'Dear ' . $this->order->buyer->name;

        } else {
            $line1 = '';
        }
        $line2 = 'Payment for your order #' . $this->order->reference . ' has been confirmed. Thank you for purchasing from us. Kindly contact us in case you have any questions, challenges or suggestions.';
        return (new MailMessage)
            ->greeting($line1)
            ->line($line2)
            ->action('View Order', url('order/' . $this->order->reference))
            ->line('Thank you for shopping with us. We really appreciate you');
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
