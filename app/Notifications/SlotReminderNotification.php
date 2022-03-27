<?php

namespace App\Notifications;

use App\Models\Slot;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SlotReminderNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Slot
     */
    protected Slot $slot;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Slot $slot)
    {
        //
        $this->slot = $slot;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = route('slots.decline', [
            'point' => $this->slot->point_id,
            'slot' => $this->slot->id,
            'token' => $this->slot->mail_reminder_token,
        ]);

        return (new MailMessage)
//                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->line('The introduction to the notification.')
                    ->action('Wypisz się', url($url))
                    ->line('Thank you for using our applicqation!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
