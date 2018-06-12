<?php namespace App\Models;

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
}