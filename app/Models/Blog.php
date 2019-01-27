<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  public $table = 'blog';
  protected $primaryKey = 'id';
  public $timestamps = false;
  
}