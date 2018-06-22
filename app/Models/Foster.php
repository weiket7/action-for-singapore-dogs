<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foster extends Model
{
  public $table = 'foster';
  protected $primaryKey = 'foster_id';
  public $timestamps = false;
  
  public function saveFoster($input) {
    $this->stat = 'A';
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->start_date = $input['start_date'];
    $this->end_date = $input['end_date'];
    $this->save();
    return $this->foster_id;
  }
  
}