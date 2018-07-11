<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DonationAdminMail extends Mailable
{
    use Queueable, SerializesModels;
  
  public $donation;
  
  public function __construct($donation)
  {
    $this->donation = $donation;
  }
  
  public function build()
  {
    return $this->subject('$' . $this->donation->amount . ' donation from ' . $this->donation->name)->view('emails.donation-admin');
  }
}
