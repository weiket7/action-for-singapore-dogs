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
    //$recipients = Setting::getAdoptionFormRecipients($this->adoption_form->email);
    $to = [$this->adoption_form->email, "info@asdsingapore.com"];
    $bcc = ["wjflow66@gmail.com", "wjflow@icloud.com", "cooper.myhre@gmail.com"];
    return $this->to($to)->bcc($bcc)
      ->subject("[Adoption Application] from ".$this->adoption_form->name)->view('emails.adoption-application');
  }
}
