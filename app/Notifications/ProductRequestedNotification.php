<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProductRequestedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your product request has been received successfully.')
            ->line('Product Name: ' . $this->product->name)
            ->line('Description: ' . $this->product->description)
            ->line('Price: ' . $this->product->price)
            ->line('Quantity: ' . $this->product->quantity);
    }
}