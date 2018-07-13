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
    $this->remark1 = $input['remark1'] ?? "";
    $this->remark2 = $input['remark2'] ?? "";
    $this->remark3 = $input['remark3'] ?? "";
    $this->save();
  }
  
}