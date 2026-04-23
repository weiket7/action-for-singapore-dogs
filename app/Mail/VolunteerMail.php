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
    // if ($this->volunteer->email == "wei_ket@hotmail.com") {
    //   $main_email = ["wei_ket@hotmail.com", "weiket7@gmail.com"];
    //   $main_email = explode(',', $main_email);
    // } else {
    //   $main_email = Setting::getMainEmail();
    //   if(in_array("Volunteering at ACRC", $this->interests)) {
    //     $main_email .= ','.Setting::getVolunteerFormArcRecipients();
    //     $main_email = explode(',', $main_email);
    //   }
    // }
    $to = ["info@asdsingapore.com"];
    $bcc = ["wjflow66@gmail.com", "wjflow@icloud.com", "Shef.asdsingapore@gmail.com", "yeo.ricky@gmail.com", "jlimjen@gmail.com"];
    return $this->to($to)->bcc($bcc)->subject('[Volunteer] from ' . $this->volunteer->name)->view('emails.volunteer');
  }
}
