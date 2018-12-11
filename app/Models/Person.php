<?php namespace App\Models;

use App\Models\Enums\PersonStat;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  public $table = 'person';
  protected $primaryKey = 'person_id';
  public $timestamps = false;
  
  public function savePerson($input) {
    $this->stat = PersonStat::Active;
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->address = $input['address'];
    $this->postal = $input['postal'];
    $this->birthday = $input['birthday'];
    $this->gender = $input['gender'];
    $this->is_adopter = $input['is_adopter'] ?? 0;
    $this->is_rescuer = $input['is_rescuer'] ?? 0;
    $this->is_foster = $input['is_foster'] ?? 0;
    $this->is_volunteer = $input['is_volunteer'] ?? 0;
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
    $this->adoption_form_id = $adoption_form->adoption_form_id;
    $this->save();
  
  }
}