<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    $recipients = Setting::getAdoptionFormRecipients($this->adoption_form->email);
    return $this->to($recipients)
      ->subject("ASD - Adoption Form")->view('emails.adoption-form');
  }
}
