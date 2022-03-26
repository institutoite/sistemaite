<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification 
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->message->subject)
                    ->view('mail.message', ['mensaje' => $this->message]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $notifiable->notification += 1;
        $notifiable->save();
        
        return [
            'url' => route('messages.show', $this->message->id),
            'message' => 'Has recibido un mensaje de ' . User::find($this->message->from_user_id)->name
        ];
    }

    public function toBroadcast($notifiable){
        return new BroadcastMessage([]);
    }

}
