<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //TODO: 日本語文字化け
        return $this->text('emails.notification_plain')
                ->to($this->contact['to'], $this->contact['to_name'])
                ->from($this->contact['from'], $this->contact['from_name'])
                ->subject($this->contact['subject'])
                ->with(['contact' => $this->contact
                ]);
                
    }
}
