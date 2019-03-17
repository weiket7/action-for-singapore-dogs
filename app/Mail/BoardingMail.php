<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BoardingMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $boarding;
  
  public function __construct($boarding)
  {
    $this->boarding = $boarding;
  }

  public function build()
  {
    $main_email = $this->boarding->email == "wei_ket@hotmail.com" ? "wei_ket@hotmail.com" : Setting::getMainEmail();
    return $this->to($main_email)->subject('[Boarding] from ' . $this->boarding->name)->view('emails.boarding');
  }
}
