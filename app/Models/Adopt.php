<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopt extends Model
{
  public $table = 'adopt';
  protected $primaryKey = 'adopt_id';
  protected $attributes = ['adopt_stat' => 'A', 'birthday'=>'', 'breed'=>'Cross Breed'];
  public $timestamps = false;
  protected $validation;
  
}