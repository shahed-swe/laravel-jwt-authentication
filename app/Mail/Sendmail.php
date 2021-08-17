<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $user_details;

    /**
     * Build the message.
     *
     * @return $this
     */

    public function __construct($title, $user_details)
    {
        //
        $this->title = $title;
        $this->user_details = $user_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)->view('user_mail'); //user_mail is the name of the template
    }
}
