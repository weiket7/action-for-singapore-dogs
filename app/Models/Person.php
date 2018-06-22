<?php namespace App\Models;

use App\Models\Enums\PersonStat;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  public $table = 'person';
  protected $primaryKey = 'person_id';
  public $timestamps = false;
  
  public function savePerson($input) {
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->address = $input['address'];
    $this->postal = $input['postal'];
    $this->birthday = $input['birthday'];
    $this->is_adopter = $input['is_adopter'];
    $this->is_rescuer = $input['is_rescuer'];
    $this->is_foster = $input['is_foster'];
    $this->is_volunteer = $input['is_volunteer'];
    $this->save();
    return $this->person_id;
  }
  
  public function saveAdoptionFormAsAdopter($adoption_form)
  {
    $this->stat = PersonStat::Active;
    $this->is_adopter = 1;
    $this->name = $adoption_form->name;
    $this->email = $adoption_form->email;
    $this->mobile = $adoption_form->mobile;
    $this->birthday = $adoption_form->birthday;
    $this->gender = $adoption_form->gender;
    $this->address = $adoption_form->address;
    $this->postal = $adoption_form->postal;
    $this->save();
  }
}