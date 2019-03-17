<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdoptionApplicationMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $adoption_form;
  public $answers;
  
  public function __construct($adoption_form, $answers)
  {
    $this->adoption_form = $adoption_form;
    $this->answers = $answers;
  }
  
  public function build()
  {
    $recipients = Setting::getAdoptionFormRecipients($this->adoption_form->email);
    return $this->to($recipients)
      ->subject("[Adoption Application] from ".$this->adoption_form->name)->view('emails.adoption-application');
  }
}
