<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Rescuer extends Model
{
  public $table = 'rescuer';
  protected $primaryKey = 'rescuer_id';
  public $timestamps = false;
  protected $validation;
  
  
  
}