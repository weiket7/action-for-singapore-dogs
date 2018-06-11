<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
  public $table = 'rescuer';
  protected $primaryKey = 'rescuer_id';
  public $timestamps = false;
  protected $validation;
  
  public function saveRescuer($input) {
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->start_date = $input['start_date'];
    $this->end_date = $input['end_date'];
    $this->save();
    return $this->rescuer_id;
  }
  
}