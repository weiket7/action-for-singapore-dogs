<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Adopt extends Model
{
  public $table = 'adopt';
  protected $primaryKey = 'adopt_id';
  protected $attributes = ['adopt_stat' => 'A', 'birthday'=>'', 'breed'=>'Cross Breed'];
  public $timestamps = false;
  protected $validation;
  protected $appends = ['age'];

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
  
  public function getGenderAttribute() {
    return $this->attributes['gender'] == 'M' ? "Male" : "Female";
  }
  
}