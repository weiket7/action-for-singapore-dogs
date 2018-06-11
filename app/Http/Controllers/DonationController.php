<?php namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Enums\PaymentMethod;
use App\Models\Rescuer;

class DonationController extends Controller {
  public function save(RescuerRequest $request, $rescuer_id = null) {
    $rescuer = new Rescuer();
    if ($rescuer_id) {
      $rescuer = Rescuer::find($rescuer_id);
    }
    return $rescuer->saveRescuer($request->all());
  }
  
  public function all() {
    $data['donations'] = Donation::all();
    $data['payment_methods'] = PaymentMethod::$values;
    return $data;
  }
  
}
