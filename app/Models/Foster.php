<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Foster extends Model
{
  public $table = 'foster';
  protected $primaryKey = 'foster_id';
  public $timestamps = false;
  protected $validation;
  
  public function saveAdopter($input) {
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->adopted_on = $input['adopted_on'];
    $this->returned = $input['returned'];
    $this->returned_on = $input['returned'];
    $this->return_reason = $input['return_reason'];
    $this->save();
    return $this->adopter_id;
  }
  
}