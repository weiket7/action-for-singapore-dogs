<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $contact;
  
  public function __construct($contact)
  {
    $this->contact = $contact;
  }
  
  public function build()
  {
    $main_email = $this->contact->email == "wei_ket@hotmail.com" ? "wei_ket@hotmail.com" : Setting::getMainEmail();
    return $this->to($main_email)->replyTo($this->contact->email)->subject('[Contact] ' . $this->contact->subject)->view('emails.contact');
  }
}
