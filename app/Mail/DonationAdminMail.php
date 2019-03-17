<?php

namespace App\Mail;

use App\Models\Setting;
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
    $main_email = $this->donation->email == "wei_ket@hotmail.com" ? "wei_ket@hotmail.com" : Setting::getMainEmail();
    return $this->to($main_email)->subject('[Donation] $' . $this->donation->amount . ' from ' . $this->donation->name)->view('emails.donation-admin');
  }
}
