<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  public $table = 'event';
  protected $primaryKey = 'event_id';
  public $timestamps = false;
  protected $validation;
  
  public function saveEvent($input) {
    $this->stat = $input['stat'];
    $this->name = $input['name'];
    $this->location = $input['location'];
    $this->date = $input['date'];
    $this->time = $input['time'];
    $this->duration = $input['duration'];
    $this->cost = $input['cost'];
    $this->save();
    return $this->event_id;
  }
}