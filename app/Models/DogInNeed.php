<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DogInNeed extends Model
{
  public $table = 'dog_in_need';
  protected $primaryKey = 'id';
  public $timestamps = false;
  
}