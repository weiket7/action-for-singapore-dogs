<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VolunteerMail extends Mailable
{
  use Queueable, SerializesModels;
  
  public $volunteer;
  public $interests;
  
  public function __construct($volunteer, Array $interests)
  {
    $this->volunteer = $volunteer;
    $this->interests = $interests;
  }
  
  public function build()
  {
    if ($this->volunteer->email == "wei_ket@hotmail.com") {
      $main_email = "wei_ket@hotmail.com";
    } else {
      $main_email = Setting::getMainEmail();
      if(in_array("Volunteering at ARC", $this->interests)) {
        $main_email .= ','.Setting::getVolunteerFormArcRecipients();
        $main_email = explode(',', $main_email);
      }
    }
    return $this->to($main_email)->subject('[Volunteer] from ' . $this->volunteer->name)->view('emails.volunteer');
  }
}
