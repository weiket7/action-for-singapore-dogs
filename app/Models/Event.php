<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Event extends Model
{
  public $table = 'event';
  protected $primaryKey = 'event_id';
  public $timestamps = false;
  
  public function saveEvent($input) {
    //$this->stat = $input['stat'];
    $this->name = $input['name'];
    $this->slug = str_slug($input['name']);
    $this->location = $input['location'];
    $this->date = $input['date'];
    $this->time = $input['time'];
    $this->desc = $input['desc'];
    if (!$this->adoption_drive) {
      $this->duration = $input['duration'];
      $this->cost = $input['cost'];
    }
    if ($this->banner_id == null) {
      $this->image = "";
    }
    $this->save();
    
    $this->saveAdoptionDrive($input['adopt_ids']);
    
    return $this->event_id;
  }
  
  private function saveAdoptionDrive($adopt_ids) {
    DB::table('adoption_drive')->where('event_id', $this->event_id)->delete();
    
    if ($adopt_ids != "") {
      foreach(explode(',', $adopt_ids) as $adopt_id) {
        DB::table('adoption_drive')->insert([
          'event_id'=>$this->event_id,
          'adopt_id'=>$adopt_id
        ]);
      }
    }
  }
}