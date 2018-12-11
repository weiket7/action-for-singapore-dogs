<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
  public $table = 'gift';
  protected $primaryKey = 'gift_id';
  public $timestamps = false;
  
  public function saveGift($input) {
    $this->name = $input['name'];
    $this->quantity = $input['quantity'];
    if ($this->gift_id == null) {
      $this->image = "";
      $this->position = Gift::max("position") + 1;
    }
    $this->save();
    return $this->gift_id;
  }
  
}