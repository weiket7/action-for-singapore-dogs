<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrainingMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $training;
  
  public function __construct($training)
  {
    $this->training = $training;
  }
  
  public function build()
  {
    $main_email = $this->training->email == "wei_ket@hotmail.com" ? "wei_ket@hotmail.com" : Setting::getMainEmail();
    return $this->to($main_email)->subject('[Basic Obedience Class] from ' . $this->training->name)->view('emails.training-email');
  }
}
