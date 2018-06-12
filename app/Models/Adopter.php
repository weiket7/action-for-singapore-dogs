<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Adopter extends Model
{
  public $table = 'adopter';
  protected $primaryKey = 'adopter_id';
  public $timestamps = false;
  
  public function saveAdopter($input) {
    $this->stat = 'A';
    $this->adopt_id = $input['adopt_id'];
    $this->person_id = $input['person_id'];
    $this->adopted_on = $input['adopted_on'];
    if ($this->adopter_id == null) {
      $this->returned = false;
    } else {
      $this->returned = $input['returned'];
      $this->returned_on = $input['returned_on'];
      $this->return_reason = $input['return_reason'];
    }
    $this->save();
    return $this->adopter_id;
  }
}