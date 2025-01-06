<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewComment extends Notification
{
    use Queueable;

    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also use 'database', 'broadcast', etc.
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Comment on Your Post')
            ->line('You have received a new comment from ' . $this->comment->user->username . ' on your post titled "' . $this->comment->post->title . '".')
            ->line('Comment: ' . $this->comment->body)
            ->action('View Comment', url('/posts/' . $this->comment->post_id))
            ->line('Thank you for using our application!');
    }
}