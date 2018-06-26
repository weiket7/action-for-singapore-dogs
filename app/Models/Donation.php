<?php namespace App\Models;

use App\Models\Enums\DonationStat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
  public $table = 'donation';
  protected $primaryKey = 'donation_id';
  public $timestamps = false;
  
  public function saveDonation($input) {
    $this->stat = DonationStat::Pending;
    $this->name = $input['name'];
    $this->mobile = $input['mobile'];
    $this->email = $input['email'];
    $this->amount = $input['amount'];
    $this->payment_method = $input['payment_method'];
    $this->donated_on = Carbon::now();
    if (isset($input['ref_no'])) {
      $this->ref_no = isset($input['ref_no']);
    }
    $this->transfer_date = $input['transfer_date'];
    $this->save();
    return $this->donation_id;
  }
  
}