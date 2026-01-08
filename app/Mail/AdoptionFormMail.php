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
    //$recipients = Setting::getAdoptionFormRecipients($this->adoption_form->email);
    $to = [$this->adoption_form->email, "info@asdsingapore.com"];
    $bcc = ["wjflow66@gmail.com", "wjflow@icloud.com", "Shef.asdsingapore@gmail.com"];
    return $this->to($to)->bcc($bcc)
      ->subject("ASD - Adoption Form")->view('emails.adoption-form');
  }
}
