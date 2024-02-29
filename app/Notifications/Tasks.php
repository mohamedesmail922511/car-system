<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Tasks extends Notification
{
    use Queueable;
    private $task_id;
    private $user_name;
    private $task_title;
    private $car_no;
    private $user_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task_id,$user_name,$task_title,$car_no,$user_id)
    {
        $this->task_id = $task_id;
        $this->user_name = $user_name;
        $this->task_title = $task_title;
        $this->car_no = $car_no;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'task_id'=>$this->task_id,
            'user_name'=>$this->user_name,
            'task_title'=>$this->task_title,
            'car_no'=>$this->car_no,
            'user_id'=>$this->user_id,
        ];
    }
}
