<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  public $table = 'event';
  protected $primaryKey = 'event_id';
  public $timestamps = false;
  protected $validation;
  
}