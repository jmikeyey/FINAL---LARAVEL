<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailMaliable extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Data to pass to the email view

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('admin.mail')
                    ->subject('Order Invoice'); // Set the email subject
    }
}
