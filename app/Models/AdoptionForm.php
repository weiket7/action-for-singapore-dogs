<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AdoptionForm extends Model
{
  public $table = 'adoption_form';
  protected $primaryKey = 'adoption_form_id';
  public $timestamps = false;

  public function saveAdoptionForm($input) {
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->birthday = $input['birthday'];
    $this->gender = $input['gender'];
    $this->address = $input['address'];
    $this->postal = $input['postal'];
    $this->submitted_on = Carbon::now();
    $this->save();
    return $this->adoption_form_id;
  }
}