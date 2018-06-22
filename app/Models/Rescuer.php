<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
  public $table = 'rescuer';
  protected $primaryKey = 'rescuer_id';
  public $timestamps = false;
  
  public function saveRescuer($input) {
    $this->stat = 'A';
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->save();
  }
  
}