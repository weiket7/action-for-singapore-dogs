<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Training extends Model
{
  public $table = 'training';
  protected $primaryKey = 'training_id';
  public $timestamps = false;
  
  public function saveTraining($input) {
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->breed = $input['breed'];
    $this->gender = $input['gender'];
    $this->age = $input['age'];
    $this->sterilised = $input['sterilised'];
    $this->date = $input['date'];
    $this->created_on = Carbon::now();
    $this->save();
    return $this->training_id;
  }
}