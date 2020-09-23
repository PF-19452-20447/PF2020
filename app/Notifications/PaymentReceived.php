<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\NexmoMessage;
use App\Renda;


class PaymentReceived extends Notification
{
    use Queueable;

    private $renda;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($renda)
    {
       $this->renda = $renda;
      // $rendas = Renda::where($renda->id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database']; //, 'nexmo'
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NexmoMessage
    */

 /*   public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                ->content('Your Laracasts payment has been processed!');
    }*/

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your payment was received!')
                    ->greeting("Your Income was paid.")
                    ->action('Notification Action', route('rendas.show', $this->renda))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'proprietario_id' => $this->renda['proprietario_id']
        ];
    }
}
