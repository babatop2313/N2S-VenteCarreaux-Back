<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvoiMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data_user;
    public $data_user_info;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($data_user_info,$data_user)
    {
        $this->data_user = $data_user;
        $this->data_user_info=$data_user_info;
    }

    public function build()
    {

         return $this->view('emails.message')->with([
           'user_info' => $this->data_user,
           'email' => $this->data_user['email'],

                    ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
          subject: 'Envoi Mail',
       );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
       return new Content(
         //view: 'view.name',
       );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
       // return [];
    }
}
