<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdoptionAgreementMail extends Mailable
{
    use Queueable, SerializesModels;
  
  public $adoption_form;
  
  public function __construct($adoption_form)
  {
    $this->adoption_form = $adoption_form;
  }
  
  public function build()
  {
    return $this->subject("ASD - Adoption Form")->view('emails.adoption-agreement');
  }
}
