<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Foster extends Model
{
  public $table = 'foster';
  protected $primaryKey = 'foster_id';
  public $timestamps = false;
  protected $validation;
  
  
  
}