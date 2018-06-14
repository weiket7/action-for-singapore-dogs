<?php namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\Enums\PaymentMethod;

class DonationController extends Controller {
  public function form(DonationRequest $request) {
    $donation = new Donation();
    return $donation->saveDonation($request->all());
  }
  
  public function save(DonationRequest $request) {
    $donation = new Donation();
    return $donation->saveDonation($request->all());
  }
  
  public function all() {
    $data['donations'] = Donation::all();
    $data['payment_methods'] = PaymentMethod::$values;
    return $data;
  }
  
}
