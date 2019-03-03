<?php namespace App\Models;

use App\Models\Enums\BoardingStat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Boarding extends Model
{
  public $table = 'boarding';
  protected $primaryKey = 'boarding_id';
  public $timestamps = false;
  
  public function saveBoarding($input) {
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->breed = $input['breed'];
    $this->gender = $input['gender'];
    $this->sterilised = $input['sterilised'];
    $this->start_date = $input['start_date'];
    $this->end_date = $input['end_date'];
    $this->created_on = Carbon::now();
    $this->save();
    return $this->boarding_id;
  }
}