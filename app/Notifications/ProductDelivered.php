<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductDelivered extends Notification
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
        if (isset($this->order->cart)) {
            $product_names = '';
            foreach ($this->order->cart as $item) {
                $product_names .=  $item['name'].', ';
            }
        }
        $products = isset($product_names) ? 'for ' . $product_names . ' with reference ID #' . $this->order->reference : ' with reference ID #' . $this->order->reference;
        $line2 = 'Your Order ' . $products . ' have been delivered successfully. Thank you for purchasing from us. Kindly contact us in case you have any questions, challenges or suggestions.';
        return (new MailMessage)
            ->greeting($line1)
            ->line($line2)
            ->action('Order Details', url('order/' . $this->order->reference))
            ->line('Thank you for shopping with us! We really appreciate your patronage');
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
