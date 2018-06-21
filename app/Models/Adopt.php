<?php namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Adopt extends Model
{
  public $table = 'adopt';
  protected $primaryKey = 'adopt_id';
  protected $attributes = ['stat' => 'A', 'birthday'=>'', 'breed'=>'Cross Breed'];
  public $timestamps = false;
  //protected $dates = ['birthday'];
  protected $appends = ['age'];

  public function saveAdopt($input) {
    $this->name = $input['name'];
    $this->slug = str_slug($this->name);
    $this->gender = $input['gender'];
    $this->birthday = Carbon::createFromFormat('Y-m-d', $input['birthday']);
    $this->breed = $input['breed'];
    $this->colour = $input['colour'];
    $this->posted_by = 'admin';
    $this->posted_on = Carbon::now();
    if ($this->adopt_id == null) {
      $this->image = "";
    }
    $this->save();
    return $this->adopt_id;
  }
  
  public function getAgeAttribute() {
    $date = new DateTime($this->birthday);
    $diff = $date->diff(new DateTime());
    $age = '';
    if($diff->y > 0) {
      $age .= $diff->y;
      if ($diff->y>1) $age.=' yrs ';
      else $age.=' yr ';
    }
    if ($diff->m > 0) {
      $age.=$diff->m;
      if ($diff->m>1) $age.=' mths';
      else $age.=' mth';
    }
    return $age;
  }
  
}