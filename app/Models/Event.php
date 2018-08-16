<?php namespace App\Models;

use App\Models\Enums\EventType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Event extends Model
{
  public $table = 'event';
  protected $primaryKey = 'event_id';
  public $timestamps = false;
  protected $appends = ['is_adoption_drive'];
  
  public function saveEvent($input) {
    //$this->stat = $input['stat'];
    $this->name = $input['name'];
    $this->type = $input['type'];
    $this->slug = str_slug($input['name'].' '.Carbon::createFromFormat('Y-m-d H:i:s', $input['date'])->format('d M Y'));
    $this->meta_desc = $input['meta_desc'];
    $this->location = $input['location'];
    $this->date = $input['date'];
    $this->time = $input['time'];
    $this->desc = $input['desc'];
    if ($this->type != EventType::BasicObedienceClass) {
      $this->duration = $input['duration'];
      $this->cost = $input['cost'];
    }
    if ($this->event_id == null) {
      $this->image = "";
    }
    $this->save();
    
    $this->saveAdoptionDrive($input['adopt_ids']);
    
    return $this->event_id;
  }
  
  public function getIsAdoptionDriveAttribute() {
    return $this->type == EventType::AdoptionDrive;
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