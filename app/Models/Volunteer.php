<?php namespace App\Models;

use App\Models\Enums\VolunteerStat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Volunteer extends Model
{
  public $table = 'volunteer';
  protected $primaryKey = 'volunteer_id';
  public $timestamps = false;
  
  public function saveVolunteer($input) {
    if ($this->volunteer_id) {
      $this->stat = $input['stat'];
    } else { //create
      $this->stat = VolunteerStat::Potential;
    }
    $this->name = $input['name']; 
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->birthday = $input['birthday'];
    $this->gender = $input['gender'];
    $this->occupation = $input['occupation'];
    $this->availability = $input['availability'];
    $this->vehicle = $input['vehicle'] ?? null;
    $this->preferred_dog_size = $input['preferred_dog_size'] ?? null;
    $this->current_no_of_dogs = $input['current_no_of_dogs'] ?? null;
    $this->publicity_area = $input['publicity_area'] ?? null;
    $this->students_average_age = $input['students_average_age'] ?? null;
    $this->created_on = Carbon::now();
    $this->save();
    $this->saveVolunteerInterest($input['interests']);
    return $this->donation_id;
  }
  
  public function saveVolunteerInterest($interests) {
    DB::table('volunteer_interest')->where('volunteer_id', $this->volunteer_id)->delete();
    
    foreach($interests as $interest) {
      DB::table('volunteer_interest')->insert([
        'volunteer_id'=>$this->volunteer_id,
        'interest'=>$interest
      ]);
    }
  }
}