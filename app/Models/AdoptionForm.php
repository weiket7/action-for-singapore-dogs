<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AdoptionForm extends Model
{
  public $table = 'adoption_form';
  protected $primaryKey = 'adoption_form_id';
  public $timestamps = false;

  public function saveAdoptionForm($input) {
  
  }
}