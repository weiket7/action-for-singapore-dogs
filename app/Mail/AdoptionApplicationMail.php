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
  public $dog_names;
  
  public function __construct($adoption_form, $answers, $dog_names)
  {
    $this->adoption_form = $adoption_form;
    $this->answers = $answers;
    $this->dog_names = $dog_names;
  }
  
  public function build()
  {
    $recipients = Setting::getAdoptionFormRecipients($this->adoption_form->email);
    return $this->to($recipients)
      ->subject("[Adoption Application] from ".$this->adoption_form->name)->view('emails.adoption-application');
  }
}
