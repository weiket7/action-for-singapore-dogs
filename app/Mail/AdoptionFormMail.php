<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class AdoptionFormMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $adoption_form;
  
  public function __construct($adoption_form)
  {
    $this->adoption_form = $adoption_form;
  }
  
  public function build()
  {
    return $this->subject("ASD - Adoption Form")->to($this->adoption_form->email)->view('emails.adoption-form');
  }
}
