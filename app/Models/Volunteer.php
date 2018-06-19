<?php namespace App\Models;

use App\Models\Enums\VolunteerStat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Volunteer extends Model
{
  public $table = 'volunteer';
  protected $primaryKey = 'volunteer_id';
  public $timestamps = false;
  
  public function saveVolunteer($input) {
    if (!$this->volunteer_id) {
      $this->stat = VolunteerStat::Active;
    }
    $this->name = $input['name'];
    $this->mobile = $input['mobile'];
    $this->email = $input['email'];
    $this->gender = $input['gender'];
    $this->birthday = $input['birthday'];
    $this->save();
    $this->saveVolunteerInterest($input['interests']);
    return $this->donation_id;
  }
  
  public function saveVolunteerInterest($interests) {
    foreach($interests as $interest) {
      DB::table('volunteer_interest')->insert([
        'volunteer_id'=>$this->volunteer_id,
        'interest'=>$interest
      ]);
    }
  }
}