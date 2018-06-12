<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
  public $table = 'volunteer';
  protected $primaryKey = 'volunteer_id';
  public $timestamps = false;
}