<?php

namespace App\Notifications;

use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;
use \Firebase\JWT\JWT;
class PasswordResetRequest extends Notification
{
    use Queueable;
    protected $token;
    protected $email;
    protected $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
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
        //create token type == 1 is user, type == 2 is counselor
        $now = time();
		$exp = $now + 7200;
		$payload = array(
			'token' => $this->token,
			'email' =>  $this->email,
            'exp' => $exp,
        );
        $token = JWT::encode($payload, 'RG9uc3NUUU9JQzVUcUs0ZGNMcFpjRG8yaFZjS3BEMXA=');
        return (new MailMessage)
            ->subject('【Sright Star】 Forgot Password')
            ->line('You are receiving this email because we  received a password reset request for your account.')
            // ->line(new HtmlString("Your new password : <b>$this->token</b>"))
            ->action('Reset Password', route('view.reset.pass', $token))
            ->line('If you did not request a password reset, no further action is required.');
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
