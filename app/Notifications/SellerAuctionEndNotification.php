<?php

namespace App\Notifications;

use App\Models\Bid;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerAuctionEndNotification extends Notification
{
    use Queueable;
    private array $bid;
    /**
     * Create a new notification instance.
     */
    public function __construct(array $bid)
    {
        $this->bid = $bid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
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
            'id' => $this->bid['bid']->product_id,
            'title' => $this->bid['bid']->product->title,
            'slug' => $this->bid['bid']->product->slug,
            'image' => $this->bid['bid']->product->getFirstMedia('images')->getUrl(),
            'bid_price' => $this->bid['bid']->bid_price,
            'price' => $this->bid['bid']->product->price,
            'end_date' => $this->bid['bid']->product->end_date,
            'message' => $this->bid['bid']->product->title.' ürününüzün süresi doldu. Lütfen işlemlere devam ediniz.'
        ];
    }
}
