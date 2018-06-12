<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
  public $table = 'donation';
  protected $primaryKey = 'donation_id';
  public $timestamps = false;
  
}