<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReciveTransferNotification extends Notification
{
    use Queueable;

    protected $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return (new MailMessage)
                    ->subject("Bạn vừa nhận một khoản tiền từ hệ thống")
->view('wallet::email.recive', ['data' => $this->data]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_name' => $this->data['user_name'],
            'amount' => $this->data['amount'],
            'trx_id' => $this->data['trx_id'],
            'request_time' => $this->data['request_time'],
            'request_id' => $this->data['request_id'],
        ];
    }
}
