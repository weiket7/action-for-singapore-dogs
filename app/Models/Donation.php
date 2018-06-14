<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
  public $table = 'donation';
  protected $primaryKey = 'donation_id';
  public $timestamps = false;
  
  public function saveDonation($input) {
    $this->name = $input['name'];
    $this->mobile = $input['mobile'];
    $this->email = $input['email'];
    $this->amount = $input['amount'];
    $this->payment_method =   $input['payment_method'];
    $this->save();
    return $this->donation_id;
    
  }
  
}