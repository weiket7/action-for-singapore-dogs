<?php namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  public $table = 'person';
  protected $primaryKey = 'person_id';
  public $timestamps = false;
  protected $validation;
}