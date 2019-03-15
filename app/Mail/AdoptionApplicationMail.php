<?php

namespace App\Mail;

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
    return $this->subject("[Adoption Application] from ".$this->adoption_form->name)->view('emails.adoption-application');
  }
}
