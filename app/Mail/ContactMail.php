<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $input;
  
  public function __construct($input)
  {
    $this->input = $input;
  }
  
  public function build()
  {
    return $this->subject($input['subject'])->view('emails.contact');
  }
}
