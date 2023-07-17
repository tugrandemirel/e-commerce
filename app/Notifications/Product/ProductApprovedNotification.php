<?php

namespace App\Notifications\Product;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductApprovedNotification extends Notification
{
    use Queueable;
    public $order;
    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
         $this->order= $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->order->id,
            'order_number' => $this->order->order_number,
            'title' => $this->order->product_title,
            'slug' => $this->order->slug,
            'image' => $this->order->product->getFirstMedia('images')->getUrl(),
            'bid_price' => $this->order->product_bid_price,
            'price' => $this->order->product_price,
            'total_price' => $this->order->product_total,
            'message' => 'Ürün onay işlemi gerçekleştirilmiştir. Lütfen kargolama sürecine geçiniz.'
        ];
    }
}
