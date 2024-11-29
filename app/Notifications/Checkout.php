<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Checkout extends Notification
{
    use Queueable;

    protected $order;
    protected $orderItems;

    /**
     * Create a new notification instance.
     */
    public function __construct($order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
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
        $mailMessage = (new MailMessage)
            ->subject('Hóa đơn đặt hàng')
            ->line('Cảm ơn bạn đã đặt hàng!')
            ->line('Mã đơn hàng: ' . $this->order->id)
            ->line('Trạng thái đơn hàng: ' . $this->order->status_order)
            ->line('Trạng thái thanh toán: ' . $this->order->status_payment);

        foreach ($this->orderItems as $item) {
            $mailMessage->line('Sản phẩm: ' . $item->productVariant->product->name)
            ->line('Kích thước: ' . $item->productVariant->size->size_value)
            ->line('Màu sắc: ' . $item->productVariant->color->color_value)
            ->line('Số lượng: ' . $item->quantity)
            ->line('Giá: ' . $item->price);
        }

        $mailMessage->line('Cảm ơn bạn đã sử dụng ứng dụng của chúng tôi!');

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'status_order' => $this->order->status_order,
            'status_payment' => $this->order->status_payment,
        ];
    }
}
