<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonationMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $donation;
  
  public function __construct($donation)
  {
    $this->donation = $donation;
  }
  
  public function build()
  {
    return $this->to($this->donation->email)
      ->subject('Thank you for $' . $this->donation->amount . ' donation to Action for Singapore Dogs')->view('emails.donation');
  }
}
