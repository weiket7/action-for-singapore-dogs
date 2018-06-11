<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Foster extends Model
{
  public $table = 'foster';
  protected $primaryKey = 'foster_id';
  public $timestamps = false;
  protected $validation;
  
  public function saveFoster($input) {
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->start_date = $input['start_date'];
    $this->end_date = $input['end_date'];
    $this->save();
    return $this->foster_id;
  }
  
}