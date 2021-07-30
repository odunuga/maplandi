<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @param $order
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
        $line2 = 'Thank You for Purchasing from us. Your payment for order #' . $this->order->reference . ' has been received successfully.';
        return (new MailMessage)
            ->subject('Invoice Paid')
            ->greeting($line1)
            ->line($line2)
            ->action('Notification Action', url('order/' . $this->order->reference))
            ->line('Thank you for your patronage.');
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
