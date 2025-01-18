<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name;
    public $last_name;
    public $email;
    public $telephone;
    public $subject;
    public $comment;
    public $policy_number;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($request, $type = "contact")
    {
        $this->email = $request["email"];
        $this->first_name = strip_tags($request["first_name"]);
        $this->last_name = strip_tags($request["last_name"]);
        $this->telephone = strip_tags($request["telephone"]);
    

        $this->comment = strip_tags($request["comment"]);

        if($type == "claim"){
            $this->policy_number = $request['policy_number'];
            $this->subject = "Claim request for #".$this->policy_number;
        }
        else{
            $this->subject = strip_tags($request["subject"]);
        }
        $this->type = $type;




    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Use the default in config.mail.php
            // from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            replyTo: [
                new Address($this->email, $this->first_name." ".$this->last_name),
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
