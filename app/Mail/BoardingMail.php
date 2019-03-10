<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BoardingMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $input;
  
  public function __construct($input)
  {
    $this->input = $input;
  }

  public function build()
  {
    return $this->subject('[Boarding] from ' . $this->input['name'])->view('emails.boarding-email');
  }
}
