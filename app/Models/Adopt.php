<?php namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Adopt extends Model
{
  public $table = 'adopt';
  protected $primaryKey = 'adopt_id';
  protected $attributes = ['stat' => 'A', 'birthday'=>'', 'breed'=>'Cross Breed'];
  public $timestamps = false;
  //protected $dates = ['birthday'];
  protected $appends = ['age'];
  use SoftDeletes;
  
  public function saveAdopt($input) {
    $this->name = $input['name'];
    $this->stat = $input['stat'];
    $this->slug = str_slug($this->name);
    $this->gender = $input['gender'];
    $this->birthday = Carbon::createFromFormat('Y-m-d', $input['birthday']);
    $this->breed = $input['breed'];
    $this->colour = $input['colour'] ?? "";
    $this->microchip = $input['microchip'] ?? 0;
    $this->vaccinate = $input['vaccinate'] ?? 0;
    $this->sterilise = $input['sterilise'] ?? 0;
    $this->hdb = $input['hdb'] ?? 0;
    if ($this->microchip) {
      $this->microchip_date = $input['microchip_date'];
      $this->microchip_no = $input['microchip_no'];
    }
    if ($this->vaccinate) {
      $this->vaccinate_date1 = $input['vaccinate_date1'];
      $this->vaccinate_date2 = $input['vaccinate_date2'];
      $this->vaccinate_date3 = $input['vaccinate_date3'];
    }
    if ($this->sterilise) {
      $this->sterilise_date = $input['sterilise_date'];
      $this->vet = $input['vet'];
    }
    $this->health = $input['health'] ?? "";
    $this->behaviour = $input['behaviour'] ?? "";
    $this->history = $input['history'] ?? "";
    $this->posted_by = 'admin';
    $this->posted_on = Carbon::now();
    if ($this->adopt_id == null) {
      $this->image = "";
    } else {
      $this->location = $input['location'] ?? "";
      $this->location_other = $input['location_other'] ?? "";
      $this->rescued_on = $input['rescued_on'] ?? null;
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